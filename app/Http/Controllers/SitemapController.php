<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $sitemap .= $this->addUrl('/', '1.0', 'daily');

        // Main sections (using anchor links)
        $sections = ['about', 'solutions', 'products', 'references', 'contact'];
        foreach ($sections as $section) {
            $sitemap .= $this->addUrl('/#' . $section, '0.8', 'weekly');
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
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
}
