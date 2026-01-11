<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $sitemap .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        // Turkish Homepage
        $sitemap .= $this->addUrlWithAlternate('/tr', '/en', '1.0', 'daily');

        // English Homepage
        $sitemap .= $this->addUrlWithAlternate('/en', '/tr', '1.0', 'daily');

        // Turkish sections
        $sections = ['about', 'solutions', 'products', 'references', 'contact'];
        foreach ($sections as $section) {
            $sitemap .= $this->addUrlWithAlternate('/tr#' . $section, '/en#' . $section, '0.8', 'weekly');
        }

        // English sections
        foreach ($sections as $section) {
            $sitemap .= $this->addUrlWithAlternate('/en#' . $section, '/tr#' . $section, '0.8', 'weekly');
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

    private function addUrlWithAlternate($url, $alternateUrl, $priority = '0.5', $changefreq = 'monthly')
    {
        $lastmod = date('Y-m-d');
        $fullUrl = url($url);
        $alternateFullUrl = url($alternateUrl);

        // Determine language from URL
        $lang = str_starts_with($url, '/tr') ? 'tr' : 'en';
        $alternateLang = $lang === 'tr' ? 'en' : 'tr';

        return "<url>
            <loc>{$fullUrl}</loc>
            <lastmod>{$lastmod}</lastmod>
            <changefreq>{$changefreq}</changefreq>
            <priority>{$priority}</priority>
            <xhtml:link rel=\"alternate\" hreflang=\"{$lang}\" href=\"{$fullUrl}\" />
            <xhtml:link rel=\"alternate\" hreflang=\"{$alternateLang}\" href=\"{$alternateFullUrl}\" />
            <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"" . url('/') . "\" />
        </url>";
    }
}
