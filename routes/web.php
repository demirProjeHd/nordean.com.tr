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

// Admin Routes
Route::prefix('panel')->name('admin.')->group(function () {
    // Auth routes (publicly accessible)
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);

    // Protected admin routes
    Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/visitor-map-data', [App\Http\Controllers\Admin\DashboardController::class, 'getVisitorMapData'])->name('dashboard.visitor-map');
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

        // Content Management
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
        Route::post('sliders/{slider}/update-order', [App\Http\Controllers\Admin\SliderController::class, 'updateOrder'])->name('sliders.update-order');
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::delete('products/{product}/pdfs/{index}', [App\Http\Controllers\Admin\ProductController::class, 'deletePdf'])->name('products.delete-pdf');
        Route::delete('products/{product}/image', [App\Http\Controllers\Admin\ProductController::class, 'deleteImage'])->name('products.delete-image');
        Route::resource('solutions', App\Http\Controllers\Admin\SolutionController::class);
        Route::resource('references', App\Http\Controllers\Admin\ReferenceController::class);
        Route::resource('pages', App\Http\Controllers\Admin\PageContentController::class)->only(['index', 'edit', 'update']);
        Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
        Route::resource('messages', App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'destroy']);
    });
});

// Error Page Testing Routes (Only in development)
if (config('app.debug')) {
    Route::prefix('test-error')->name('test.error.')->group(function () {
        Route::get('/401', fn() => abort(401))->name('401');
        Route::get('/403', fn() => abort(403))->name('403');
        Route::get('/404', fn() => abort(404))->name('404');
        Route::get('/419', fn() => abort(419))->name('419');
        Route::get('/429', fn() => abort(429))->name('429');
        Route::get('/500', fn() => abort(500))->name('500');
        Route::get('/503', fn() => abort(503))->name('503');
    });
}
