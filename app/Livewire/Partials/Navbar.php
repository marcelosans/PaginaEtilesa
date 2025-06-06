<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Helpers\CartManagement;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $total_count = 0;

    public function mount()
    {
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }

    #[On('update-cart-count')]
    public function updateCartCount($total_count)
    {
        $this->total_count = $total_count;
    }

    #[On('locale-changed')]
    public function refreshAfterLocaleChange()
    {
        return redirect(request()->header('Referer'));
        // Esta función se activará cuando cambie el idioma
        // No necesitamos hacer nada específico, solo refrescar el componente
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}