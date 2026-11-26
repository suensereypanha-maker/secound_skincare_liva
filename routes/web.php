<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $locale = $request->cookie('liva_locale', session('locale', config('app.locale')));
    if (in_array($locale, ['en', 'km', 'kh'])) {
        $normalized = ($locale === 'kh') ? 'km' : $locale;
        App::setLocale($normalized);
    }

    return view('welcome');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/locale/{lang}', function (string $lang, Request $request) {
    if (in_array($lang, ['en', 'km', 'kh'])) {
        $normalized = ($lang === 'kh') ? 'km' : $lang;
        session(['locale' => $normalized]);
        cookie()->queue(cookie('liva_locale', $normalized, 60 * 24 * 365));
        App::setLocale($normalized);
    }

    return redirect()->back();
})->name('locale.switch');
