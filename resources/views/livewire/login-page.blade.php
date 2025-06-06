<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Video de fondo -->
    <video autoplay muted loop class="absolute h-full w-full object-cover">
        <source src="{{ asset('vid/login.mp4') }}" type="video/mp4">
        <!-- Puedes agregar un fallback con una imagen estática -->
    </video>
    
    <!-- Gradiente para mejorar la visibilidad del contenido sobre el video -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-600 to-purple-800 opacity-90"></div>
    
    <!-- Contenedor del login -->
    <div class="z-10 max-w-md w-full bg-white rounded-3xl shadow-xl p-8">
        <!-- Logo ETILESA como imagen -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logoEtilesa.png') }}" alt="ETILESA" class="h-12">
        </div>
        
        <h2 class="text-lg font-medium text-center text-gray-700 mb-8">{{ __('login.login_title') }}</h2>
        
        <form wire:submit="save">
            <!-- Correo -->
            <div class="mb-4">
                <input wire:model="email" id="email" type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('login.email_placeholder') }}">
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Contraseña -->
            <div class="mb-2">
                <input wire:model="password" id="password" type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('login.password_placeholder') }}">
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Mensaje de error de autenticación -->
            @if (session()->has('error'))
                <div class="mb-4 text-sm text-red-500">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Enlace de olvido de contraseña -->
            <div class="mb-6">
                <a href="/forgot-page" class="text-sm text-gray-600 hover:text-purple-500">{{ __('login.forgot_password') }}</a>
            </div>
            
            <!-- Botón de inicio de sesión -->
            <button type="submit" class="w-full bg-purple-500 text-white py-3 px-4 rounded-full hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-200">
                {{ __('login.login_button') }}
            </button>
        </form>
        
        <!-- Enlace de registro -->
        <p class="text-center mt-6 text-sm text-gray-600">
            {{ __('login.no_account') }}
            <a href="/register" class="text-purple-500 hover:text-purple-700">{{ __('login.register_link') }}</a>
        </p>
    </div>
</div>