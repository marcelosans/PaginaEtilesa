<?php

namespace App\Livewire;
use App\Models\Product;

use Livewire\Component;

class ProductDetailPage extends Component
{
    public $slug;
    public $quantity = 1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

   

    public function render()
    {
        return view('livewire.product-detail-page',[
            'products' => Product::where('slug', $this->slug)->firstOrFail()
        ]);
    }
}
