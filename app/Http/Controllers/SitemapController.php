<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $sitemap .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        // Turkish Homepage (one-page application)
        $sitemap .= $this->addUrlWithAlternate('/tr', '/en', '1.0', 'weekly');

        // English Homepage (one-page application)
        $sitemap .= $this->addUrlWithAlternate('/en', '/tr', '1.0', 'weekly');

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'text/xml; charset=utf-8');
    }

    private function addUrl($url, $priority = '0.5', $changefreq = 'monthly')
    {
        $lastmod = date('Y-m-d');
        $fullUrl = url($url);

        return "<url>
            <loc>{$fullUrl}</loc>
            <lastmod>{$lastmod}</lastmod>
            <changefreq>{$changefreq}</changefreq>
            <priority>{$priority}</priority>
        </url>";
    }

    private function addUrlWithAlternate($url, $alternateUrl, $priority = '0.5', $changefreq = 'monthly')
    {
        $lastmod = date('Y-m-d');

        // Use production URL for sitemap even in local environment
        $baseUrl = config('app.env') === 'production'
            ? config('app.url')
            : 'https://nordean.com.tr';

        $fullUrl = $baseUrl . $url;
        $alternateFullUrl = $baseUrl . $alternateUrl;

        // Determine language from URL
        $lang = str_starts_with($url, '/tr') ? 'tr' : 'en';
        $alternateLang = $lang === 'tr' ? 'en' : 'tr';

        // x-default should point to Turkish (primary language)
        $xDefaultUrl = $baseUrl . '/tr';

        $xml = "  <url>\n";
        $xml .= "    <loc>{$fullUrl}</loc>\n";
        $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
        $xml .= "    <changefreq>{$changefreq}</changefreq>\n";
        $xml .= "    <priority>{$priority}</priority>\n";
        $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"{$lang}\" href=\"{$fullUrl}\" />\n";
        $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"{$alternateLang}\" href=\"{$alternateFullUrl}\" />\n";
        $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"{$xDefaultUrl}\" />\n";
        $xml .= "  </url>\n";

        return $xml;
    }
}
