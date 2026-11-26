<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(Request $request): View
    {
        $this->applyLocale($request);

        return view('about');
    }

    public function contact(Request $request): View
    {
        $this->applyLocale($request);

        return view('contact');
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $this->applyLocale($request);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'contact_info' => ['required', 'string', 'max:120'],
            'topic' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $isKm = App::getLocale() === 'km';
        $message = $isKm
            ? 'អរគុណ '.$validated['name'].'! សាររបស់អ្នកត្រូវបានផ្ញើដោយជោគជ័យ ក្រុមការងាររបស់យើងនឹងឆ្លើយតបឆាប់ៗនេះ។'
            : 'Thank you, '.$validated['name'].'! Your message has been received and our concierge will respond shortly.';

        return redirect()
            ->route('contact')
            ->with('contact_success', $message);
    }

    private function applyLocale(Request $request): void
    {
        $locale = $request->cookie('liva_locale', session('locale', config('app.locale')));
        if (in_array($locale, ['en', 'km', 'kh'])) {
            App::setLocale($locale === 'kh' ? 'km' : $locale);
        }
    }
}
