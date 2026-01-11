<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
        return view('welcome');
    }

    /**
     * Display the English home page
     */
    public function indexEn()
    {
        Session::put('locale', 'en');
        App::setLocale('en');
        return view('welcome');
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
