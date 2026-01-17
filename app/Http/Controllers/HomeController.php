<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Solution;
use App\Models\Reference;
use App\Models\PageContent;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Redirect to appropriate language based on geo-location
     */
    public function index(Request $request)
    {
        // Check if user already has a language preference in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            return redirect()->route('home.' . $locale);
        }

        // Simple geo-location based on IP
        $userIP = $request->ip();

        // Check if IP is from Turkey (simplified check)
        // For production, you might want to use a proper geo-IP service
        $isTurkey = $this->isTurkishIP($userIP);

        $locale = $isTurkey ? 'tr' : 'en';

        Session::put('locale', $locale);
        App::setLocale($locale);

        return redirect()->route('home.' . $locale);
    }

    /**
     * Simple check if IP is from Turkey
     * For localhost/development, defaults to Turkish
     */
    private function isTurkishIP($ip)
    {
        // Localhost/private IPs default to Turkish
        if (in_array($ip, ['127.0.0.1', '::1']) || strpos($ip, '192.168.') === 0 || strpos($ip, '10.') === 0) {
            return true;
        }

        // You can add Turkish IP ranges here
        // For now, we'll use a simple country header check if available
        // Most hosting providers set this automatically

        return true; // Default to Turkish
    }

    /**
     * Display the Turkish home page
     */
    public function indexTr()
    {
        Session::put('locale', 'tr');
        App::setLocale('tr');
        return $this->showHomePage();
    }

    /**
     * Display the English home page
     */
    public function indexEn()
    {
        Session::put('locale', 'en');
        App::setLocale('en');
        return $this->showHomePage();
    }

    /**
     * Fetch data from database and return home page view
     */
    private function showHomePage()
    {
        $locale = app()->getLocale();
        $settings = Setting::all()->pluck('value', 'key');

        $data = [
            'sliders' => Slider::active()->orderBy('order')->get(),
            'categories' => Category::with(['products' => function($query) {
                $query->where('is_active', true)->orderBy('order');
            }])->active()->orderBy('order')->get(),
            'products' => Product::with('category')->active()->orderBy('order')->get(),
            'solutions' => Solution::active()->orderBy('order')->get(),
            'references' => Reference::active()->orderBy('order')->get(),
            'pageContents' => PageContent::all()->keyBy('key'),
            'settings' => $settings,
            // SEO Meta Tags from settings
            'title' => $settings["meta_title_{$locale}"] ?? 'NORDEAN - Isolgomma Türkiye Distribütörü',
            'description' => $settings["meta_description_{$locale}"] ?? 'İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye\'deki tek yetkili distribütörü.',
            'keywords' => $settings["meta_keywords_{$locale}"] ?? 'isolgomma, ses yalıtımı, titreşim yalıtımı',
        ];

        return view('welcome', $data);
    }

    /**
     * Change language
     */
    public function changeLanguage($locale)
    {
        if (in_array($locale, ['tr', 'en'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
}
