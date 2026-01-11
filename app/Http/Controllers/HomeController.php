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
