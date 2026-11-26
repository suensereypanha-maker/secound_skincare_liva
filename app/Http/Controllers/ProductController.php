<?php

namespace App\Http\Controllers;

use App\Services\ProductCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->applyLocale($request);

        $products = array_values(ProductCatalog::all());
        $initialFilter = (string) $request->query('filter', 'all');
        $initialCategory = (string) $request->query('category', 'all');
        $initialQuery = (string) $request->query('q', '');

        return view('products.index', compact('products', 'initialFilter', 'initialCategory', 'initialQuery'));
    }

    public function show(string $id, Request $request)
    {
        $this->applyLocale($request);

        $product = ProductCatalog::find($id);

        if (! $product) {
            return redirect()->route('home');
        }

        $relatedProducts = ProductCatalog::related($id, 4);

        $availableItems = collect(ProductCatalog::all())
            ->filter(fn ($p) => ($p['category'] ?? '') !== 'sets')
            ->values()
            ->all();

        $reviews = ProductCatalog::reviewsFor($id);

        return view('product.show', compact('product', 'relatedProducts', 'availableItems', 'reviews'));
    }

    private function applyLocale(Request $request): void
    {
        $locale = $request->cookie('liva_locale', session('locale', config('app.locale')));
        if (in_array($locale, ['en', 'km', 'kh'])) {
            App::setLocale($locale === 'kh' ? 'km' : $locale);
        }
    }
}
