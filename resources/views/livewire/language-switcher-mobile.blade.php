<div class="flex gap-4">
    @foreach($availableLocales as $locale => $name)
        <button wire:click="switchLocale('{{ $locale }}')" class="hover:text-gray-600 transition flex flex-col items-center">
            <span class="inline-block w-8 h-6 rounded overflow-hidden mb-1">
                <img src="{{ asset('img/flags/' . $locale . '.png') }}" alt="{{ $name }}" class="w-full h-full object-cover">
            </span>
            <span class="text-xs">{{ strtoupper($locale) }}</span>
        </button>
    @endforeach
</div>