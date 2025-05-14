<div class="bg-white rounded-lg mt-[6em] mb-[2em] shadow-md p-6 max-w-2xl mx-auto">
    <!-- Título del componente -->
    <h2 class="text-2xl font-bold text-purple-800 mb-6 text-center">@lang('profile.profile_management')</h2>
    
    <!-- Mensaje de éxito -->
    @if ($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ __('profile.success_message') }}</span>
        </div>
    @endif
    
    @error('save_error')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror

    <form wire:submit.prevent="updateProfile" class="space-y-6">
        <!-- Campo Nombre -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">@lang('profile.name')</label>
            <input type="text" wire:model="name" id="name" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 border-gray-300"
                placeholder="@lang('profile.name_placeholder')">
            @error('name') <span class="text-red-500 text-xs mt-1">{{ __('validation.required', ['attribute' => __('profile.name')]) }}</span> @enderror
        </div>
        
        <!-- Campo Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">@lang('profile.email')</label>
            <input type="email" wire:model="email" id="email" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 border-gray-300"
                placeholder="@lang('profile.email_placeholder')">
            @error('email') <span class="text-red-500 text-xs mt-1">{{ __('validation.email', ['attribute' => __('profile.email')]) }}</span> @enderror
        </div>
        
        <!-- Sección de contraseña -->
        <div class="pt-4 border-t border-gray-200">
            <h3 class="text-lg font-medium text-purple-700 mb-3">@lang('profile.change_password')</h3>
            <p class="text-sm text-gray-600 mb-4">@lang('profile.password_info')</p>
            
            <!-- Contraseña actual -->
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">@lang('profile.current_password')</label>
                <input type="password" wire:model="current_password" id="current_password" 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 border-gray-300">
                @error('current_password') <span class="text-red-500 text-xs mt-1">{{ __('validation.current_password') }}</span> @enderror
            </div>
            
            <!-- Nueva contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">@lang('profile.new_password')</label>
                <input type="password" wire:model="password" id="password" 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 border-gray-300">
                @error('password') <span class="text-red-500 text-xs mt-1">{{ __('validation.password') }}</span> @enderror
            </div>
            
            <!-- Confirmar contraseña -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">@lang('profile.confirm_password')</label>
                <input type="password" wire:model="password_confirmation" id="password_confirmation" 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 border-gray-300">
            </div>
        </div>
        
        <!-- Botón de envío -->
        <div class="flex justify-end">
            <button type="submit" 
                class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-colors">
                <div wire:loading wire:target="updateProfile" class="inline-block mr-2">
                    <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                @lang('profile.save_changes')
            </button>
        </div>
    </form>
</div>