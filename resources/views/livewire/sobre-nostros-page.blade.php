<div class="relative w-full min-h-screen bg-gradient-to-br from-purple-900 via-purple-600 to-indigo-800 overflow-hidden">
    <!-- Video de fondo con efecto blur -->
    <video class="absolute top-0 left-0 w-full h-full object-cover blur-xl opacity-30" autoplay loop muted playsinline>
        <source src="{{ asset('vid/aboutus.mp4') }}" type="video/mp4">
        {{ __('about.browser_not_support') }}
    </video>

    <!-- Overlay con patrón sutil -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-900/20 via-transparent to-indigo-900/20" 
         style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.05) 0%, transparent 50%);"></div>

    <!-- Contenedor principal que separa secciones -->
    <div class="relative z-10 flex flex-col items-center w-full">
        <!-- Primera sección (pantalla completa) -->
        <section class="w-full max-w-6xl flex flex-col md:flex-row items-center justify-between px-4 md:px-8 text-white py-20 min-h-screen">
            <!-- Sección de texto -->
            <div class="md:w-1/2 text-left">
                <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">{{ __('about.about_us') }}</h1>
                <p class="text-xl mt-6 drop-shadow-lg">{{ __('about.intro_text') }}</p>
                <a href="#conocenos" class="mt-8 inline-block bg-gradient-to-r from-purple-700 to-purple-900 hover:from-purple-800 hover:to-purple-950 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    {{ __('about.discover_more') }}
                </a>
            </div>
            <!-- Imagen complementaria en el header -->
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <img src="{{ asset('img/about.png') }}" alt="Etilesa Console" 
                    class="rounded-lg shadow-2xl max-w-full h-auto"
                    style="max-height: 450px;">
            </div>
        </section>

        <!-- Sección Conócenos con gradiente púrpura suave -->
        <section id="conocenos" class="bg-gradient-to-br from-purple-100 via-purple-200 to-violet-300 text-purple-900 py-32 text-center w-full min-h-[80vh] flex flex-col items-center justify-center relative overflow-hidden">
            <!-- Elementos decorativos de fondo -->
            <div class="absolute top-0 left-0 w-full h-full opacity-20">
                <div class="absolute top-20 left-10 w-72 h-72 bg-purple-400 rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-violet-400 rounded-full blur-3xl"></div>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-7xl font-bold bg-gradient-to-r from-purple-800 to-violet-900 bg-clip-text text-transparent">{{ __('about.who_we_are') }}</h2>
                <p class="mt-6 text-lg max-w-5xl mx-auto px-4 text-purple-800">
                    {{ __('about.who_we_are_text') }}
                </p>
                <div class="mt-8 max-w-5xl mx-auto px-4">
                    <p class="text-lg text-purple-800">
                        {{ __('about.who_we_are_extended') }}
                    </p>
                    <p class="text-lg mt-4 text-purple-800">
                        {{ __('about.who_we_are_passion') }}
                    </p>
                    <p class="text-lg mt-4 text-purple-800">
                        {{ __('about.who_we_are_team') }}
                    </p>
                </div>
                <img src="{{ asset('img/logo2.webp') }}" alt="Etilesa Logo" 
                    class="w-[40%] max-w-md mx-auto mt-10 drop-shadow-lg"
                    id="logo">
            </div>
        </section>

        <!-- Sección Visión con fondo púrpura oscuro estrellado -->
        <section class="bg-gradient-to-b from-purple-900 via-violet-900 to-purple-800 text-white py-32 text-center w-full min-h-[80vh] flex flex-col justify-center relative overflow-hidden">
            <!-- Efecto estrellado -->
            <div class="absolute inset-0 opacity-60">
                <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-purple-200 rounded-full animate-pulse"></div>
                <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-violet-200 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-1/4 left-1/2 w-1.5 h-1.5 bg-purple-300 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
                <div class="absolute top-1/2 right-1/4 w-1 h-1 bg-violet-300 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="absolute bottom-1/3 left-1/3 w-2 h-2 bg-purple-200 rounded-full animate-pulse" style="animation-delay: 1.5s;"></div>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-7xl font-bold bg-gradient-to-r from-purple-300 to-violet-200 bg-clip-text text-transparent">{{ __('about.our_vision') }}</h2>
                <p class="mt-6 text-lg max-w-5xl mx-auto px-4 text-purple-100">
                    "{{ __('about.our_vision_text') }}"
                </p>
            </div>
        </section>

        <!-- Sección Consola con gradiente púrpura vibrante -->
        

        <section class="bg-gradient-to-br from-purple-900 via-violet-900 to-purple-800 text-white py-32 w-full min-h-[80vh] flex flex-col justify-center relative overflow-hidden">
            <!-- Elementos decorativos con tema tech -->
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <div class="absolute top-1/4 left-1/5 w-56 h-56 bg-gradient-to-r from-purple-500 to-violet-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-1/4 right-1/5 w-72 h-72 bg-gradient-to-r from-violet-500 to-purple-600 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-purple-400 rounded-full blur-2xl"></div>
            </div>
            
            <!-- Patrón de código sutil -->
            <div class="absolute inset-0 opacity-5" 
                 style="background-image: repeating-linear-gradient(45deg, transparent, transparent 20px, rgba(255,255,255,0.1) 20px, rgba(255,255,255,0.1) 22px);"></div>
            
            <div class="max-w-6xl mx-auto px-4 relative z-10 text-center">
                <h2 class="text-7xl font-bold mb-16 bg-gradient-to-r from-purple-300 via-violet-200 to-purple-300 bg-clip-text text-transparent">{{ __('about.our_tech') }}</h2>
                
                <p class="text-lg mb-12 max-w-3xl mx-auto text-purple-100">
                    {{ __('about.tech_intro') }}
                </p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Laravel -->
                    <div class="group bg-gradient-to-br from-purple-800/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-700/30 hover:border-purple-400/50 transition-all duration-300 hover:shadow-xl hover:shadow-purple-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">L</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-purple-300">Laravel</h3>
                        <p class="text-sm text-purple-200">{{ __('about.laravel_desc') }}</p>
                    </div>
                    
                    <!-- Livewire -->
                    <div class="group bg-gradient-to-br from-purple-800/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-700/30 hover:border-violet-400/50 transition-all duration-300 hover:shadow-xl hover:shadow-violet-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-violet-600 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">⚡</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-violet-300">Livewire</h3>
                        <p class="text-sm text-purple-200">{{ __('about.livewire_desc') }}</p>
                    </div>
                    
                    <!-- Tailwind CSS -->
                    <div class="group bg-gradient-to-br from-purple-800/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-700/30 hover:border-purple-300/50 transition-all duration-300 hover:shadow-xl hover:shadow-purple-400/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-500 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">🎨</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-purple-300">Tailwind CSS</h3>
                        <p class="text-sm text-purple-200">{{ __('about.tailwind_desc') }}</p>
                    </div>
                    
                    <!-- MySQL -->
                    <div class="group bg-gradient-to-br from-purple-800/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-700/30 hover:border-violet-300/50 transition-all duration-300 hover:shadow-xl hover:shadow-violet-400/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-violet-400 to-violet-500 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">🗄️</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-violet-300">MySQL</h3>
                        <p class="text-sm text-purple-200">{{ __('about.mysql_desc') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Videojuegos con gradiente púrpura intenso -->
        <section class="bg-gradient-to-br from-violet-900 via-purple-800 to-violet-800 text-white py-32 w-full min-h-[80vh] relative overflow-hidden">
            <!-- Patrón geométrico sutil con tonos púrpuras -->
            <div class="absolute inset-0 opacity-15" 
                 style="background-image: linear-gradient(45deg, transparent 25%, rgba(147,51,234,0.2) 25%, rgba(147,51,234,0.2) 50%, transparent 50%, transparent 75%, rgba(147,51,234,0.2) 75%), linear-gradient(-45deg, transparent 25%, rgba(147,51,234,0.2) 25%, rgba(147,51,234,0.2) 50%, transparent 50%, transparent 75%, rgba(147,51,234,0.2) 75%); background-size: 60px 60px;"></div>
            
            <!-- Elementos decorativos púrpuras -->
            <div class="absolute top-0 left-0 w-full h-full opacity-20">
                <div class="absolute top-1/4 left-1/6 w-48 h-48 bg-gradient-to-r from-purple-500 to-violet-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-1/3 right-1/6 w-64 h-64 bg-gradient-to-r from-violet-500 to-purple-600 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-purple-400 rounded-full blur-2xl"></div>
            </div>
            
            <div class="max-w-6xl mx-auto px-4 relative z-10">
                <h2 class="text-7xl font-bold text-center mb-16 bg-gradient-to-r from-purple-300 via-violet-200 to-purple-300 bg-clip-text text-transparent">{{ __('about.our_games') }}</h2>
                
                <!-- Contenedor de video con diseño moderno -->
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Video principal -->
                    <div class="w-full lg:w-2/3">
                        <div class="relative group">
                            <!-- Marco decorativo -->
                            <div class="absolute -inset-4 bg-gradient-to-r from-purple-400 via-violet-400 to-purple-500 rounded-2xl blur-lg opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                            
                            <!-- Video container -->
                            <div class="relative bg-gradient-to-br from-purple-900/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-400/30">
                                <video 
                                    class="w-full h-auto rounded-lg shadow-2xl" 
                                    controls 
                                    preload="metadata"
                                    poster="{{ asset('img/captura2.png') }}"
                                    style="max-height: 400px;">
                                    <source src="{{ asset('vid/etilesaVideo.mp4') }}" type="video/mp4">
                                    {{ __('about.video_not_supported') }}
                                </video>
                                
                                
                               
                            </div>
                        </div>
                    </div>
                    
                    <!-- Información del juego -->
                    <div class="w-full lg:w-1/3 space-y-6">
                        <div class="bg-gradient-to-br from-purple-800/50 to-violet-900/50 backdrop-blur-sm rounded-xl p-6 border border-purple-700/30">
                            <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-purple-300 to-violet-200 bg-clip-text text-transparent">
                                {{ __('about.featured_game') }}
                            </h3>
                            <p class="text-purple-200 mb-4">
                                {{ __('about.game_description') }}
                            </p>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-purple-300">{{ __('about.genre') }}:</span>
                                    <span class="text-white">{{ __('about.game_genre') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-purple-300">{{ __('about.platform') }}:</span>
                                    <span class="text-white">{{ __('about.game_platform') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-purple-300">{{ __('about.status') }}:</span>
                                    <span class="text-green-400">{{ __('about.game_status') }}</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Galería de screenshots (opcional) -->
                <div class="mt-16">
                    <h3 class="text-3xl font-bold text-center mb-8 bg-gradient-to-r from-purple-300 to-violet-200 bg-clip-text text-transparent">
                        {{ __('about.game_gallery') }}
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="group relative overflow-hidden rounded-lg">
                            <img src="{{ asset('img/captura1.png') }}" alt="Game Screenshot 1" 
                                 class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="group relative overflow-hidden rounded-lg">
                            <img src="{{ asset('img/captura2.png') }}" alt="Game Screenshot 2" 
                                 class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="group relative overflow-hidden rounded-lg">
                            <img src="{{ asset('img/captura3.png') }}" alt="Game Screenshot 3" 
                                 class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="group relative overflow-hidden rounded-lg">
                            <img src="{{ asset('img/captura4.png') }}" alt="Game Screenshot 4" 
                                 class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gradient-to-br from-purple-800 via-violet-700 to-purple-900 text-white py-32 w-full min-h-[80vh] flex flex-col justify-center items-center relative overflow-hidden">
            <!-- Elementos decorativos -->
            <div class="absolute top-0 left-0 w-full h-full opacity-20">
                <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-purple-500 to-violet-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-to-r from-violet-500 to-purple-400 rounded-full blur-3xl"></div>
            </div>
            
            <div class="max-w-6xl mx-auto px-4 relative z-10">
                <h2 class="text-7xl font-bold text-center bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">{{ __('about.our_console') }}</h2>
                
                <div class="mt-12 flex flex-col md:flex-row items-center">
                    <!-- Imagen de la consola -->
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <img src="{{ asset('img/quikipad2.jpg') }}" alt="Etilesa Console" 
                            class="rounded-lg shadow-2xl mx-auto max-w-full h-auto transform hover:scale-105 transition-transform duration-300"
                            style="max-height: 400px;">
                    </div>
                    
                    <!-- Texto descriptivo -->
                    <div class="md:w-1/2 md:pl-10 text-left">
                        <h3 class="text-3xl font-bold mb-6">{{ __('about.console_title') }}</h3>
                        <p class="text-lg mb-4">
                            {{ __('about.console_description') }}
                        </p>
                        <p class="text-lg mb-4">
                            {{ __('about.console_raspberry') }}
                        </p>
                        <p class="text-lg">
                            {{ __('about.console_retropie') }}
                        </p>
                        
                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-purple-700 to-purple-900 p-4 rounded-lg backdrop-blur-sm shadow-lg">
                                <h4 class="font-bold text-xl mb-2">{{ __('about.features') }}</h4>
                                <ul class="list-disc list-inside text-left">
                                    <li>{{ __('about.feature_1') }}</li>
                                    <li>{{ __('about.feature_2') }}</li>
                                    <li>{{ __('about.feature_3') }}</li>
                                </ul>
                            </div>
                            <div class="bg-gradient-to-br from-violet-700 to-violet-900 p-4 rounded-lg backdrop-blur-sm shadow-lg">
                                <h4 class="font-bold text-xl mb-2">{{ __('about.specs') }}</h4>
                                <ul class="list-disc list-inside text-left">
                                    <li>{{ __('about.spec_1') }}</li>
                                    <li>{{ __('about.spec_2') }}</li>
                                    <li>{{ __('about.spec_3') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        

        <!-- Sección Proceso con fondo púrpura claro y moderno -->
        <section class="bg-gradient-to-br from-purple-50 via-violet-100 to-purple-200 text-purple-900 py-32 w-full relative overflow-hidden">
            <!-- Elementos decorativos sutiles -->
            <div class="absolute top-0 left-0 w-full h-full opacity-15">
                <div class="absolute top-20 left-20 w-40 h-40 bg-purple-400 rounded-full blur-2xl"></div>
                <div class="absolute bottom-20 right-20 w-60 h-60 bg-violet-400 rounded-full blur-2xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-purple-300 rounded-full blur-3xl"></div>
            </div>
            
            <div class="max-w-6xl mx-auto px-4 relative z-10">
                <h2 class="text-7xl font-bold text-center mb-16 bg-gradient-to-r from-purple-800 to-violet-800 bg-clip-text text-transparent">{{ __('about.our_process') }}</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Paso 1 -->
                    <div class="text-center p-6 bg-white/70 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-purple-200/50">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4 shadow-lg">1</div>
                        <h3 class="text-2xl font-bold mb-4 text-purple-800">{{ __('about.process_1_title') }}</h3>
                        <p class="text-purple-700">{{ __('about.process_1_description') }}</p>
                    </div>
                    
                    <!-- Paso 2 -->
                    <div class="text-center p-6 bg-white/70 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-purple-200/50">
                        <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-violet-700 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4 shadow-lg">2</div>
                        <h3 class="text-2xl font-bold mb-4 text-purple-800">{{ __('about.process_2_title') }}</h3>
                        <p class="text-purple-700">{{ __('about.process_2_description') }}</p>
                    </div>
                    
                    <!-- Paso 3 -->
                    <div class="text-center p-6 bg-white/70 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-purple-200/50">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4 shadow-lg">3</div>
                        <h3 class="text-2xl font-bold mb-4 text-purple-800">{{ __('about.process_3_title') }}</h3>
                        <p class="text-purple-700">{{ __('about.process_3_description') }}</p>
                    </div>
                    
                    <!-- Paso 4 -->
                    <div class="text-center p-6 bg-white/70 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-purple-200/50">
                        <div class="w-20 h-20 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4 shadow-lg">4</div>
                        <h3 class="text-2xl font-bold mb-4 text-purple-800">{{ __('about.process_4_title') }}</h3>
                        <p class="text-purple-700">{{ __('about.process_4_description') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Contacto -->
        
    </div>
</div>