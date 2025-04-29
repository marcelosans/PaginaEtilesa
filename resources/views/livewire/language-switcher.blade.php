<div class="relative group/language">
    <button class="nav-link flex items-center hover:text-gray-400 transition">
        <!-- Bandera actual -->
        <span class="inline-block w-6 h-4 rounded overflow-hidden mr-1">
            <img src="{{ asset('img/flags/' . $currentLocale . '.png') }}" alt="{{ $availableLocales[$currentLocale] ?? $currentLocale }}" class="w-full h-full object-cover">
        </span>
        <span class="mr-1">{{ strtoupper($currentLocale) }}</span>
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
        </svg>
    </button>
    
    <div class="absolute left-0 mt-2 w-32 bg-white text-black rounded-lg shadow-lg 
        opacity-0 invisible group-hover/language:visible group-hover/language:opacity-100 
        transition-all duration-300 ease-in-out 
        border border-gray-200 z-50">
        
        @foreach($availableLocales as $locale => $name)
            <button wire:click="switchLocale('{{ $locale }}')" class="block w-full px-4 py-2 hover:bg-gray-100 text-sm flex items-center {{ $loop->first ? 'rounded-t-lg' : '' }} {{ $loop->last ? 'rounded-b-lg' : '' }}">
                <span class="inline-block w-6 h-4 rounded overflow-hidden mr-2">
                    <img src="{{ asset('img/flags/' . $locale . '.png') }}" alt="{{ $name }}" class="w-full h-full object-cover">
                </span>
                {{ $name }}
            </button>
        @endforeach
    </div>
</div>