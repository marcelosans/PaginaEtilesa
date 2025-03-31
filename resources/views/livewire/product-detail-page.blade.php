<div class="flex flex-col md:flex-row items-center justify-between p-4 md:p-8 min-h-screen mt-[3em] bg-gray-50">
    <!-- Columna de imágenes del producto -->
    <div class="w-full md:w-1/2 md:sticky md:top-20" x-data="{ mainImage: '{{url('storage',$products->images[0])}}' }">
        <!-- Imagen principal -->
        <div class="relative mb-4 overflow-hidden bg-white rounded-lg shadow-sm">
            <img x-bind:src="mainImage" alt="{{$products->name}}" class="object-cover w-full h-[150px] md:h-[400px]">
        </div>
        
        <!-- Miniaturas -->
        <div class="grid grid-cols-4 gap-2 mt-2">
            @foreach ($products->images as $index => $image)
            <div class="overflow-hidden bg-white rounded cursor-pointer transition-all duration-200" 
                 x-on:click="mainImage='{{url('storage',$image)}}'"
                 :class="{'ring-2 ring-purple-500': mainImage === '{{url('storage',$image)}}'}">
                <img src="{{url('storage',$image)}}" alt="Thumbnail {{$index}}" 
                     class="object-cover w-full h-20 hover:opacity-90 transition-opacity">
            </div>
            @endforeach
        </div>
        
        <!-- Badge de envío gratuito -->
        <div class="flex items-center mt-6 p-3 bg-white rounded-lg shadow-sm border-l-4 border-purple-500">
            <span class="flex items-center justify-center w-10 h-10 mr-3 bg-purple-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-gray-800">Envío Gratuito</h3>
                <p class="text-sm text-gray-600">Recibe tu producto en 24-48 horas</p>
            </div>
        </div>
    </div>
    
    <!-- Columna de información del producto -->
    <div class="w-full md:w-1/2 p-4 md:p-8 mt-6 md:mt-0 bg-white rounded-lg shadow-sm">
        <!-- Información del producto -->
        <span class="inline-block px-3 py-1 text-xs font-semibold text-purple-800 bg-purple-100 rounded-full mb-3">En stock</span>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800">{{$products->name}}</h1>
        <br>
        
        
        <div class="text-2xl font-bold text-purple-600 mb-6">
            {{$products->price}} €
        </div>
        
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2 text-gray-800">Descripción</h2>
            <p class="text-gray-600">{{$products->description}}</p>
        </div>
        
        <!-- Selector de cantidad -->
        <div class="flex items-center">
            <button wire:click="decreaseQty" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-100 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </button>
            <input 
                type="number" 
                wire:model.live="quantity" 
                min="1" 
                class="w-12 h-8 text-center border-t border-b border-gray-300 text-sm focus:outline-none"
            >
            <button wire:click="increaseQty" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-100 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
        
        <!-- Botones de acción -->
        <div class="flex flex-col sm:flex-row gap-3 mt-4">
            <button wire:click="addToCart({{ $products->id }})" class="w-full sm:w-3/5 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Añadir al Carrito
            </button>
        </div>
        
        <!-- Información adicional -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex items-center text-sm text-gray-600 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                De la mejor tienda
            </div>
            <div class="flex items-center text-sm text-gray-600 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                30 días para devoluciones
            </div>
            
        </div>
    </div>
</div>