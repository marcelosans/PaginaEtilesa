<div class="min-h-screen relative overflow-hidden">
    <!-- Video background -->
    <div class="absolute inset-0 w-full h-full z-0">
        <video 
            src="{{ asset('/vid/login.mp4') }}" 
            class="w-full h-full object-cover"
            style="pointer-events: none;"
            loop
            muted
            autoplay
            playsinline
        ></video>
    </div>

    <div class="relative min-h-screen flex items-center justify-center p-4 z-10">
        <div class="w-full max-w-4xl overflow-hidden rounded-lg shadow-2xl bg-black bg-opacity-40 backdrop-blur-sm">
            <!-- Main container with two panels side by side -->
            <div class="flex flex-col md:flex-row h-full">
                <!-- First panel - changes based on active form -->
                <div class="md:w-1/2 transition-all duration-500 ease-in-out overflow-hidden"
                     x-data="{ showLogin: @entangle('showLoginForm') }">
                    
                    <!-- Login form (shown on left when login is active) -->
                    <div x-show="showLogin"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                         class="bg-white h-full p-8 flex flex-col justify-center">
                        
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800">Iniciar Sesión</h2>
                        </div>

                        @if($loginError)
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                                <p>{{ $loginError }}</p>
                            </div>
                        @endif

                        @if($registerSuccess)
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                                <p>{{ $registerSuccess }}</p>
                            </div>
                        @endif

                        <form wire:submit.prevent="login" class="space-y-4">
                            <div>
                                <input type="email" id="email" wire:model.defer="email" 
                                       placeholder="Email"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') border-red-500 @enderror">
                                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input type="password" id="password" wire:model.defer="password" 
                                       placeholder="Contraseña"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('password') border-red-500 @enderror">
                                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="text-right">
                                <button type="button" wire:click="forgotPassword" class="text-sm font-medium text-gray-600 hover:text-purple-500">
                                    ¿Olvidaste tu contraseña?
                                </button>
                            </div>

                            <div>
                                <button type="submit" 
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-3xl text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <span wire:loading.remove wire:target="login">SIGN IN</span>
                                    <span wire:loading wire:target="login">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Procesando...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Welcome panel for register (shown on left when register is active) -->
                    <div x-show="!showLogin"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                         class="bg-red-500 h-full p-12 flex flex-col justify-center items-center text-center">
                        <h3 class="text-3xl font-bold text-white mb-6">¡Bienvenido!</h3>
                        <p class="text-white text-opacity-90 mb-8">
                            ¿Ya tienes una cuenta? Inicia sesión para acceder a nuestra plataforma.
                        </p>
                        <button wire:click="toggleForm" 
                                class="px-10 py-2 border-2 border-white rounded-3xl text-white font-medium hover:bg-white hover:text-red-500 transition-colors">
                            SIGN IN
                        </button>
                    </div>
                </div>

                <!-- Second panel - changes based on active form -->
                <div class="md:w-1/2 transition-all duration-500 ease-in-out overflow-hidden"
                     x-data="{ showLogin: @entangle('showLoginForm') }">
                    
                    <!-- Welcome panel for login (shown on right when login is active) -->
                    <div x-show="showLogin"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform -translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-full"
                         class="bg-red-500 h-full p-12 flex flex-col justify-center items-center text-center">
                        <h3 class="text-3xl font-bold text-white mb-6">Hello, Friend!</h3>
                        <p class="text-white text-opacity-90 mb-8">
                            Enter your personal details and start journey with us
                        </p>
                        <button wire:click="toggleForm" 
                                class="px-10 py-2 border-2 border-white rounded-3xl text-white font-medium hover:bg-white hover:text-red-500 transition-colors">
                            SIGN UP
                        </button>
                    </div>
                    
                    <!-- Register form (shown on right when register is active) -->
                    <div x-show="!showLogin"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform -translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-full"
                         class="bg-white h-full p-8 flex flex-col justify-center">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800">Crear Cuenta</h2>
                        </div>

                        <form wire:submit.prevent="register" class="space-y-4">
                            <div>
                                <input type="text" id="name" wire:model.defer="name" 
                                       placeholder="Nombre"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('name') border-red-500 @enderror">
                                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input type="email" id="register_email" wire:model.defer="email" 
                                       placeholder="Email"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') border-red-500 @enderror">
                                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input type="password" id="register_password" wire:model.defer="password" 
                                       placeholder="Contraseña"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('password') border-red-500 @enderror">
                                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input type="password" id="password_confirmation" wire:model.defer="passwordConfirmation" 
                                       placeholder="Confirmar Contraseña"
                                       class="block w-full px-4 py-3 bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('passwordConfirmation') border-red-500 @enderror">
                                @error('passwordConfirmation') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <button type="submit" 
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-3xl text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <span wire:loading.remove wire:target="register">SIGN UP</span>
                                    <span wire:loading wire:target="register">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Procesando...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>