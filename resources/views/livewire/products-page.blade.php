<div class="container mt-[3em] mx-auto pt-8 pb-6 px-4 bg-white max-w-7xl">
    <h1 class="text-2xl font-bold mb-4 text-gray-900">@lang('products.products')</h1>
    
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Sidebar con filtros -->
        <div class="w-full md:w-1/5">
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold mb-3 text-gray-900">@lang('products.filters')</h2>
                
                <form action="" method="GET">
                    <!-- Filtro de categorías -->
                    <div class="mb-4">
                        <h3 class="font-medium mb-2 text-gray-900 text-sm">@lang('products.categories')</h3>
                        <div class="space-y-1">
                            @foreach($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" id="category{{ $category->id }}" name="categories[]"
                                       value="{{ $category->id }}"
                                       wire:model.live="selected_categories"
                                       class="mr-2">
                                <label for="category{{ $category->id }}" class="text-gray-700 text-sm">
                                    @if(isset($translatedCategories[$category->id]))
                                        {{ $translatedCategories[$category->id] }}
                                    @else
                                        {{ $category->name }}
                                        @if(app()->getLocale() !== 'es')
                                            <span wire:init="translateCategory({{ $category->id }})" class="hidden"></span>
                                        @endif
                                    @endif
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    
                    <!-- Filtro de rango de precio -->
                   <div class="mb-4">
    <div class="flex items-center justify-between mb-2">
        <h3 class="font-medium text-gray-900 text-sm">@lang('products.price')</h3>
    </div>
    
    <!-- Slider de rango de precios -->
    <!-- Campos de entrada de precios -->
    <div class="flex items-center space-x-2">
        <div class="w-1/2">
            <input 
                type="number" 
                wire:model.live="min_price" 
                min="{{ $min_product_price }}"
                max="{{ $max_product_price }}"
                class="w-full border border-gray-300 rounded-md px-2 py-1 text-center text-gray-900 text-sm focus:outline-none focus:ring-1 focus:ring-purple-500"
            >
        </div>
        <div class="text-gray-900 text-sm">—</div>
        <div class="w-1/2">
            <input 
                type="number" 
                wire:model.live="max_price" 
                min="{{ $min_product_price }}"
                max="{{ $max_product_price }}"
                class="w-full border border-gray-300 rounded-md px-2 py-1 text-center text-gray-900 text-sm focus:outline-none focus:ring-1 focus:ring-purple-500"
            >
        </div>
    </div>
</div>
                    
                </form>
            </div>
        </div>
        
        <!-- Listado de productos -->
        <div class="w-full md:w-4/5">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 flex flex-col">
                    <a href="/product-detail-page/{{$product->slug}}">
                        <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover">
                    </a>
                    <div class="p-3 flex flex-col flex-grow">
                        <!-- Nombre del producto -->
                        <h3 class="text-sm font-semibold mt-1 text-gray-900" 
                            wire:key="product-name-{{ $product->id }}">
                            @if(isset($translatedProducts[$product->id]['name']))
                                {{ $translatedProducts[$product->id]['name'] }}
                            @else
                                {{ $product->name }}
                                @if(app()->getLocale() !== 'es')
                                    <span wire:init="translateProduct({{ $product->id }}, 'name')" class="hidden"></span>
                                @endif
                            @endif
                        </h3>
                        
                        <!-- Descripción del producto -->
                        <p class="text-gray-700 text-xs mt-1 line-clamp-2" 
                           wire:key="product-desc-{{ $product->id }}">
                            @if(isset($translatedProducts[$product->id]['description']))
                                {{ $translatedProducts[$product->id]['description'] }}
                            @else
                                {{ $product->description }}
                                @if(app()->getLocale() !== 'es')
                                    <span wire:init="translateProduct({{ $product->id }}, 'description')" class="hidden"></span>
                                @endif
                            @endif
                        </p>
                        
                        <div class="mt-2 flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900">{{ number_format($product->price, 2) }}€</span>
                        </div>
                        <br>
                        <!-- Botón añadir al carrito -->
                        <a wire:click.prevent="addToCart({{ $product->id }})" href="#" class="bg-purple-600 text-white py-2 text-xs rounded-md hover:bg-purple-700 transition mt-auto w-full text-center">
                            <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>@lang('products.add_to_cart')</span>  
                            <span wire:loading wire:target='addToCart({{ $product->id }})'>@lang('products.adding')</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-6">
        {{$products->links()}}
    </div>
</div>