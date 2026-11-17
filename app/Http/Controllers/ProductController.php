<?php

namespace App\Http\Controllers;

use App\Services\ProductCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function show(string $id, Request $request)
    {
        $locale = $request->cookie('liva_locale', session('locale', config('app.locale')));
        if (in_array($locale, ['en', 'km', 'kh'])) {
            App::setLocale($locale === 'kh' ? 'km' : $locale);
        }

        $product = ProductCatalog::find($id);

        if (!$product) {
            return redirect()->route('home');
        }

        $relatedProducts = ProductCatalog::related($id, 4);

        return view('product.show', compact('product', 'relatedProducts'));
    }
}

