<?php

namespace App\Livewire;

use App\Models\Product;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Illuminate\Support\Facades\App;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use DeepL\Translator;

class ProductDetailPage extends Component
{
    use LivewireAlert;

    public $slug;
    public $quantity = 1;
    public $product;
    public $translatedName = '';
    public $translatedDescription = '';
    public $isTranslating = false;

    // La clave de API de DeepL
    private $apiKey = "18ef9366-c1e9-415d-b6db-839ac5c2e9c3:fx";

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
        $idiomaDestino = strtoupper(App::getLocale());

        if($idiomaDestino == 'EN')
        {
            $idiomaDestino = 'en-US';
        }

        //dd($idiomaDestino);
        
        // Si el idioma es español, usamos el texto original
        if ($idiomaDestino == 'ES') {
            if ($field == 'name') {
                $this->translatedName = $text;
            } else if ($field == 'description') {
                $this->translatedDescription = $text;
            }
            return;
        }

        // Lista de códigos de idioma válidos para DeepL
        $idiomasValidos = ['en-US','BG', 'CS', 'DA', 'DE', 'EL', 'EN', 'ES', 'ET', 'FI', 'FR', 'HU', 'ID', 'IT', 'JA', 'KO', 'LT', 'LV', 'NB', 'NL', 'PL', 'PT', 'RO', 'RU', 'SK', 'SL', 'SV', 'TR', 'UK', 'ZH'];

        // Si el idioma no está en la lista, usamos inglés por defecto
        if (!in_array($idiomaDestino, $idiomasValidos)) {
            $idiomaDestino = 'en-US'; // Cambié 'ES' por 'EN' como fallback
        }

        try {
            // Usar la librería DeepL PHP
            $translator = new Translator($this->apiKey);
            //dd($idiomaDestino);
            $result = $translator->translateText($text, 'ES', $idiomaDestino);

            if ($result) {
                $traducido = $result->text;
                if ($field == 'name') {
                    $this->translatedName = $traducido;
                } else if ($field == 'description') {
                    $this->translatedDescription = $traducido;
                }
            } else {
                
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
