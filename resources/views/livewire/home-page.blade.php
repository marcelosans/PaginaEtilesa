<div class="relative w-full min-h-screen bg-purple-600 overflow-hidden">
    <!-- Video de fondo con efecto blur -->
    <video class="absolute top-0 left-0 w-full h-full object-cover blur-xl opacity-50" autoplay loop muted playsinline>
        <source src="{{ asset('vid/6266-190550868_large.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos.
    </video>

    <!-- Contenedor principal que separa secciones -->
    <div class="relative z-10 flex flex-col items-center w-full">
        <!-- Primera sección (pantalla completa) -->
        <section class="w-full max-w-6xl flex flex-col md:flex-row items-center justify-between px-4 md:px-8 text-white py-20 min-h-screen">
            <!-- Sección de texto -->
            <div class="md:w-1/2 text-left">
                <h1 class="text-4xl md:text-6xl font-bold text-white">@lang('homepage.quikipad')</h1>
                <p class="text-base md:text-lg mt-4 font-medium">@lang('homepage.play_all_retro_games')</p>

                <!-- Botones -->
                <div class="mt-6 flex flex-col md:flex-row gap-4">
                    <a href="/product-detail-page/quikipad" class="px-6 py-3 bg-white text-black rounded-full text-lg font-semibold shadow-lg hover:bg-gray-200 transition">
                        @lang('homepage.buy_quikipad')
                    </a>
                    <a href="#" class="px-6 py-3 bg-gray-200 text-black rounded-full text-lg font-semibold shadow-lg hover:bg-gray-300 transition">
                        @lang('homepage.view_products')
                    </a>
                </div>
            </div>

            <!-- Imagen de la consola -->
            <div class="md:w-1/2 flex justify-center mt-8 md:mt-0">
                <img src="{{ asset('img/finished-removebg-preview.png') }}" alt="Quikipad" class="max-w-xs md:max-w-lg drop-shadow-xl">
            </div>
        </section>

        <!-- Segunda sección -->
        <section class="w-full bg-gray-100 py-20 text-center text-gray-900 min-h-[70vh] flex flex-col justify-center">
            <div class="max-w-4xl mx-auto px-6">
                <h1 class="text-3xl md:text-4xl font-bold">@lang('homepage.multi_console_title')</h1>
                <p class="text-base md:text-lg mt-4">@lang('homepage.multi_console_description')</p>
            </div>

            <!-- Slider -->
            <div data-hs-carousel='{
                "loadingClasses": "opacity-0",
                "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer",
                "isCentered": true,
                "slidesQty": {
                  "xs": 1,
                  "lg": 2
                }
            }' class="relative mt-10 w-full max-w-4xl mx-auto">
                <div class="hs-carousel w-full overflow-hidden bg-white rounded-lg shadow-lg">
                    <div class="relative min-h-72 -mx-1">
                        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                            @foreach (['ps1.png', 'snes.png', 'psp.png', 'gba.png', 'gbc.png', 'nes.png', 'snes.png'] as $img)
                                <div class="hs-carousel-slide px-1">
                                    <div class="flex justify-center h-full bg-gray-{{ rand(100, 300) }} p-6">
                                        <span class="self-center text-sm text-gray-800"><img src="{{ asset('img/' . $img) }}" alt=""></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Botones de navegación -->
                <button type="button" class="hs-carousel-prev absolute inset-y-0 start-0 inline-flex justify-center items-center w-10 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none rounded-s-lg">
                    <svg class="shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                </button>
                <button type="button" class="hs-carousel-next absolute inset-y-0 end-0 inline-flex justify-center items-center w-10 h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none rounded-e-lg">
                    <svg class="shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </button>

                <!-- Paginación -->
                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
            </div>
        </section>

        <!-- Características -->
        <section class="w-full min-h-[60vh] bg-stone-800 flex items-center text-white">
            <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between w-full">
                <div class="md:w-1/2 my-7">
                    <h2 class="text-3xl md:text-4xl font-bold">@lang('homepage.features_title')</h2>
                    <ul class="mt-6 space-y-3 text-base md:text-lg">
                        <li>@lang('homepage.feature_1')</li>
                        <li>@lang('homepage.feature_2')</li>
                        <li>@lang('homepage.feature_3')</li>
                    </ul>
                    <a href="/product-detail-page/quikipad" class="mt-6 inline-block bg-white text-black px-6 py-3 rounded-full text-lg font-semibold shadow-lg hover:bg-gray-200 transition">
                        @lang('homepage.buy_quikipad')
                    </a>
                </div>

                <div class="md:w-1/2 flex justify-center mt-8 md:mt-0 py-1">
                    <img src="{{ asset('img/raspberry.png') }}" alt="Raspberry Pi" class="max-w-xs md:max-w-sm">
                </div>
            </div>
        </section>
    </div>
</div>
