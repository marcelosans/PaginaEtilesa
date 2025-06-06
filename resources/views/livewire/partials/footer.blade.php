<div>
    <footer class="bg-white text-black py-8 z-50">
        <div class="max-w-6xl mx-auto flex flex-col items-center md:items-start space-y-8 text-center md:text-left">
            <!-- Logo en columna -->
            <div>
                <img src="{{ asset('img/logoEtilesa.png') }}" alt="Etilesa Logo" class="h-10" id="logo">
            </div>
    
            <!-- Menú de navegación en columna -->
            <nav class="flex flex-col items-center md:items-start space-y-2">
                <a href="/sobre-nostros" class="hover:underline">{{ __('footer.about_us') }}</a>
                <a href="/products-page" class="hover:underline">{{ __('footer.products') }}</a>
                <a href="/product-detail-page/quikipad" class="hover:underline">{{ __('footer.buy_quikipad') }}</a>
            </nav>
    
            <!-- Redes sociales en fila -->
            <div class="flex space-x-4">
                <a href="https://www.youtube.com/watch?v=kz0GC257rS8&list=LL&index=9" class="text-black hover:opacity-75">
                    <img src="https://www.svgrepo.com/show/473495/youtube.svg" alt="Youtube" class="w-8 h-8">
                </a>
                <a href="https://x.com/HIDEO_KOJIMA_EN" class="text-black hover:opacity-75">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/X_icon_2.svg/480px-X_icon_2.svg.png" alt="Twitter" class="w-8 h-8">
                </a>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="copy mt-8">
            <p class="text-center text-gray-400 text-sm">© {{ date('Y') }} Etilesa. {{ __('footer.all_rights_reserved') }}</p>
        </div>
    </footer>
    
</div>