<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Main Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Language-specific Routes (for SEO)
Route::get('/tr', [HomeController::class, 'indexTr'])->name('home.tr');
Route::get('/en', [HomeController::class, 'indexEn'])->name('home.en');

// Language Switcher
Route::get('/lang/{locale}', [HomeController::class, 'changeLanguage'])->name('lang.switch');

// Contact Form
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
