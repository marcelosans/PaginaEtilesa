<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

    public $translatedProducts = [];
    public $translatedCategories = [];

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
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->min_price = max(0, min($this->min_price, $this->max_price));
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->max_price = max($this->min_price, $this->max_price);
        $this->resetPage();
    }

    public function translateProduct($productId, $field)
    {
        $product = Product::find($productId);
        if (!$product) return;

        $locale = App::getLocale();
        
        // Si es español, usar texto original
        if ($locale === 'es') {
            $this->translatedProducts[$productId][$field] = $product->{$field};
            return;
        }

        // Buscar en caché primero
        $cacheKey = "product_translation_{$productId}_{$field}_{$locale}";
        $translation = Cache::get($cacheKey);

        if ($translation) {
            $this->translatedProducts[$productId][$field] = $translation;
        } else {
            // Traducir y guardar en caché
            $translation = $this->translateText($product->{$field}, $locale);
            Cache::put($cacheKey, $translation, now()->addHours(24)); // Cache por 24 horas
            $this->translatedProducts[$productId][$field] = $translation;
        }
    }

    public function translateCategory($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) return;

        $locale = App::getLocale();
        
        // Si es español, usar texto original
        if ($locale === 'es') {
            $this->translatedCategories[$categoryId] = $category->name;
            return;
        }

        // Buscar en caché primero
        $cacheKey = "category_translation_{$categoryId}_{$locale}";
        $translation = Cache::get($cacheKey);

        if ($translation) {
            $this->translatedCategories[$categoryId] = $translation;
        } else {
            // Traducir y guardar en caché
            $translation = $this->translateText($category->name, $locale);
            Cache::put($cacheKey, $translation, now()->addHours(24)); // Cache por 24 horas
            $this->translatedCategories[$categoryId] = $translation;
        }
    }

    private function translateText($text, $targetLocale)
    {
        try {
            $tr = new GoogleTranslate();
            $tr->setSource('es');
            $tr->setTarget($targetLocale === 'en' ? 'en' : strtolower($targetLocale));
            $translated = $tr->translate($text);
            return $translated ?: $text;
        } catch (\Exception $e) {
            return $text;
        }
    }

    public function loadTranslations()
    {
        $locale = App::getLocale();
        
        if ($locale === 'es') {
            return; // No traducir si es español
        }

        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        $productQuery->whereBetween('price', [$this->min_price, $this->max_price]);
        $products = $productQuery->paginate(9);
        $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);

        // Cargar traducciones desde caché para productos visibles
        foreach ($products as $product) {
            foreach (['name', 'description'] as $field) {
                $cacheKey = "product_translation_{$product->id}_{$field}_{$locale}";
                $translation = Cache::get($cacheKey);
                if ($translation) {
                    $this->translatedProducts[$product->id][$field] = $translation;
                }
            }
        }

        // Cargar traducciones desde caché para categorías
        foreach ($categories as $category) {
            $cacheKey = "category_translation_{$category->id}_{$locale}";
            $translation = Cache::get($cacheKey);
            if ($translation) {
                $this->translatedCategories[$category->id] = $translation;
            }
        }
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        $productQuery->whereBetween('price', [$this->min_price, $this->max_price]);

        $products = $productQuery->paginate(9);
        $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);

        // Cargar traducciones existentes desde caché
        $this->loadTranslations();

        return view('livewire.products-page', [
            'products' => $products,
            'categories' => $categories,
            'min_product_price' => Product::where('is_active', 1)->min('price') ?? 0,
            'max_product_price' => Product::where('is_active', 1)->max('price') ?? 0
        ]);
    }
}