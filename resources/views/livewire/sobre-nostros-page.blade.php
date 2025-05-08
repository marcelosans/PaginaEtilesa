<div class="relative w-full min-h-screen bg-purple-600 overflow-hidden">
    <!-- Video de fondo con efecto blur -->
    <video class="absolute top-0 left-0 w-full h-full object-cover blur-xl opacity-50" autoplay loop muted playsinline>
        <source src="{{ asset('vid/aboutus.mp4') }}" type="video/mp4">
        {{ __('about.browser_not_support') }}
    </video>

    <!-- Contenedor principal que separa secciones -->
    <div class="relative z-10 flex flex-col items-center w-full">
        <!-- Primera sección (pantalla completa) -->
        <section class="w-full max-w-6xl flex flex-col md:flex-row items-center justify-between px-4 md:px-8 text-white py-20 min-h-screen">
            <!-- Sección de texto -->
            <div class="md:w-1/2 text-left">
                <h1 class="text-4xl md:text-6xl font-bold text-white">{{ __('about.about_us') }}</h1>
            </div>
        </section>

        <section class="bg-gray-400 text-black py-32 text-center w-full min-h-[80vh] flex flex-col items-center justify-center">
            <h2 class="text-7xl font-bold">{{ __('about.who_we_are') }}</h2>
            <p class="mt-6 text-lg max-w-5xl mx-auto">
                {{ __('about.who_we_are_text') }}
            </p>
            <img src="{{ asset('img/logo2.webp') }}" alt="Etilesa Logo" 
                class="w-[40%] max-w-md mx-auto mt-6"
                id="logo">
        </section>


<section class="bg-black text-white py-32 text-center w-full min-h-[80vh] flex flex-col justify-center">
    <h2 class="text-7xl font-bold">{{ __('about.our_vision') }}</h2>
    <p class="mt-6 text-lg max-w-5xl mx-auto">
        "{{ __('about.our_vision_text') }}"
    </p>
</section>

        
    </div>
</div>