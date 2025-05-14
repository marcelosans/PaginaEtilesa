<?php

namespace App\Livewire;

use App\Models\Product;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Illuminate\Support\Facades\App;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductDetailPage extends Component
{
    use LivewireAlert;

    public $slug;
    public $quantity = 1;
    public $product;
    public $translatedName = '';
    public $translatedDescription = '';
    public $isTranslating = false;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->firstOrFail();

        // Iniciar traducciones si el idioma no es español
        if (App::getLocale() !== 'es') {
            $this->translateProductInfo();
        } else {
            // Si es español, usamos el texto original
            $this->translatedName = $this->product->name;
            $this->translatedDescription = $this->product->description;
        }
    }

    public function translateProductInfo()
    {
        $this->isTranslating = true;

        // Traducir nombre del producto
        $this->translateText($this->product->name, 'name');

        // Traducir descripción del producto
        $this->translateText($this->product->description, 'description');

        $this->isTranslating = false;
    }

    public function translateText($text, $field)
    {
        $idiomaDestino = strtolower(App::getLocale());

        // Si el idioma es español, usamos el texto original
        if ($idiomaDestino == 'es') {
            if ($field == 'name') {
                $this->translatedName = $text;
            } else if ($field == 'description') {
                $this->translatedDescription = $text;
            }
            return;
        }

        // Manejar el caso especial para inglés
        if ($idiomaDestino == 'en') {
            $idiomaDestino = 'en';
        }

        try {
            // Usar la librería Stichoza Google Translate
            $tr = new GoogleTranslate();
            $tr->setSource('es'); // Idioma de origen (español)
            $tr->setTarget($idiomaDestino); // Idioma de destino

            $traducido = $tr->translate($text);
            
            if ($traducido) {
                if ($field == 'name') {
                    $this->translatedName = $traducido;
                } else if ($field == 'description') {
                    $this->translatedDescription = $traducido;
                }
            } else {
                // Si falla la traducción, usar el texto original
                if ($field == 'name') {
                    $this->translatedName = $text;
                } else if ($field == 'description') {
                    $this->translatedDescription = $text;
                }
            }
        } catch (\Exception $e) {
            // En caso de excepción, usamos el texto original
            if ($field == 'name') {
                $this->translatedName = $text;
            } else if ($field == 'description') {
                $this->translatedDescription = $text;
            }
        }
    }

    public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Producto añadido al carrito', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'products' => $this->product
        ]);
    }
}