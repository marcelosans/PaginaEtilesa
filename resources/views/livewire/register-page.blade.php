<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Video de fondo -->
    <video autoplay muted loop class="absolute h-full w-full object-cover">
        <source src="{{ asset('vid/login.mp4') }}" type="video/mp4">
    </video>
    
    <!-- Gradiente para mejorar la visibilidad del contenido sobre el video -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-600 to-purple-800 opacity-90"></div>
    
    <!-- Contenedor del registro -->
    <div class="z-10 max-w-md w-full bg-white rounded-3xl shadow-xl p-8">
        <!-- Logo ETILESA como imagen -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logoEtilesa.png') }}" alt="ETILESA" class="h-12">
        </div>
        
        <h2 class="text-lg font-medium text-center text-gray-700 mb-8">{{ __('register.title') }}</h2>
        
        <form wire:submit="register">
            <!-- Nombre -->
            <div class="mb-4">
                <input wire:model="name" id="name" type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('register.name_placeholder') }}">
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Correo -->
            <div class="mb-4">
                <input wire:model="email" id="email" type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('register.email_placeholder') }}">
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Contraseña -->
            <div class="mb-4">
                <input wire:model="password" id="password" type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('register.password_placeholder') }}">
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Confirmar Contraseña -->
            <div class="mb-6">
                <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="{{ __('register.password_confirmation_placeholder') }}">
                @error('password_confirmation') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            
            <!-- Mensajes de error o éxito -->
            @if (session()->has('error'))
                <div class="mb-4 text-sm text-red-500">
                    {{ session('error') }}
                </div>
            @endif
            
            @if (session()->has('success'))
                <div class="mb-4 text-sm text-green-500">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Botón de registro -->
            <button type="submit" class="w-full bg-purple-500 text-white py-3 px-4 rounded-full hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-200">
                {{ __('register.submit_button') }}
            </button>
        </form>
        
        <!-- Enlace de login -->
        <p class="text-center mt-6 text-sm text-gray-600">
            {{ __('register.already_have_account') }} 
            <a href="/login" class="text-purple-500 hover:text-purple-700">{{ __('register.login_link') }}</a>
        </p>
    </div>
</div>