<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcherMobile extends Component
{
    public $currentLocale;

    public function mount()
    {
        $this->currentLocale = Session::get('locale', config('app.locale'));
    }

    public function switchLocale($locale)
    {
        if (array_key_exists($locale, config('app.available_locales', []))) {
            Session::put('locale', $locale);
            App::setLocale($locale);
            $this->currentLocale = $locale;
            $this->dispatch('locale-changed');
        }
    }

    public function render()
    {
        return view('livewire.language-switcher-mobile', [
            'availableLocales' => config('app.available_locales', [
                'es' => 'Español',
                'en' => 'English',
                'pl' => 'Polski',
                'ca' => 'Català',
            ])
        ]);
    }
}