<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        return view('welcome');
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
