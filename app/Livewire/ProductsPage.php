<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductsPage extends Component
{
    use LivewireAlert;
    use WithPagination;
    
    #[Url]
    public $selected_categories = [];

    #[Url]
    public $min_price;

    #[Url]
    public $max_price;

    public function mount()
    {
        // Set default min and max prices based on product prices
        $this->min_price = Product::where('is_active', 1)->min('price') ?? 0;
        $this->max_price = Product::where('is_active', 1)->max('price') ?? 0;
    }

    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Producto añadido al carrito',[
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function updatedSelectedCategories()
    {
        // Trigger pagination reset when categories change
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        // Ensure min price doesn't exceed max price
        $this->min_price = max(0, min($this->min_price, $this->max_price));
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        // Ensure max price isn't less than min price
        $this->max_price = max($this->min_price, $this->max_price);
        $this->resetPage();
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        // Filter by categories if selected
        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        // Filter by price range
        $productQuery->whereBetween('price', [$this->min_price, $this->max_price]);

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(9),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
            'min_product_price' => Product::where('is_active', 1)->min('price') ?? 0,
            'max_product_price' => Product::where('is_active', 1)->max('price') ?? 0
        ]);
    }
}