<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Only track homepage visits
        if (!$request->is('/') && !$request->is('tr') && !$request->is('en')) {
            return $next($request);
        }

        // Check if it's a bot
        if ($this->isBot($request)) {
            return $next($request);
        }

        // Get visitor data
        try {
            $ip = $this->getIp($request);
            $location = $this->getLocation($ip);

            Visitor::create([
                'ip' => $ip,
                'country_code' => $location['country_code'] ?? null,
                'country_name' => $location['country_name'] ?? null,
                'city' => $location['city'] ?? null,
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
                'referer' => $request->header('referer'),
            ]);
        } catch (\Exception $e) {
            // Silently fail - don't break the user experience
            \Log::error('Visitor tracking failed: ' . $e->getMessage());
        }

        return $next($request);
    }

    /**
     * Check if request is from a bot
     */
    private function isBot(Request $request): bool
    {
        $userAgent = strtolower($request->userAgent() ?? '');

        $botPatterns = [
            'bot', 'crawl', 'spider', 'scraper', 'curl', 'wget', 'python',
            'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider',
            'yandexbot', 'facebookexternalhit', 'twitterbot', 'whatsapp',
            'telegram', 'linkedinbot', 'ia_archiver', 'ahrefsbot', 'semrushbot',
            'mj12bot', 'dotbot', 'petalbot', 'screaming frog'
        ];

        foreach ($botPatterns as $pattern) {
            if (str_contains($userAgent, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get visitor IP address
     */
    private function getIp(Request $request): string
    {
        // Check for proxy headers
        $headers = [
            'HTTP_CF_CONNECTING_IP', // Cloudflare
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_REAL_IP',
            'REMOTE_ADDR'
        ];

        foreach ($headers as $header) {
            $ip = $request->server($header);
            if ($ip && filter_var($ip, FILTER_VALIDATE_IP)) {
                // If multiple IPs, get the first one
                if (str_contains($ip, ',')) {
                    $ip = trim(explode(',', $ip)[0]);
                }
                return $ip;
            }
        }

        return $request->ip();
    }

    /**
     * Get location data from IP
     * Using ip-api.com free API (45 requests per minute limit)
     */
    private function getLocation(string $ip): array
    {
        // Skip localhost/private IPs
        if ($ip === '127.0.0.1' || $ip === '::1' || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
            return [
                'country_code' => 'TR',
                'country_name' => 'Turkey (Local)',
                'city' => 'Local'
            ];
        }

        try {
            $response = Http::timeout(2)->get("http://ip-api.com/json/{$ip}", [
                'fields' => 'status,country,countryCode,city'
            ]);

            if ($response->successful() && $response->json('status') === 'success') {
                return [
                    'country_code' => $response->json('countryCode'),
                    'country_name' => $response->json('country'),
                    'city' => $response->json('city'),
                ];
            }
        } catch (\Exception $e) {
            \Log::warning('IP geolocation failed: ' . $e->getMessage());
        }

        return [];
    }
}
