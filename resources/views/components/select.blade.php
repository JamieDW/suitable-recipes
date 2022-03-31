<div class="w-full">
    <label class="block font-medium text-sm" for="{{ $name }}">
        {{ $title }}
        @isset($subtitle)            
            <span class="text-xs text-gray-500">{{ $subtitle }}</span>
        @endisset
    </label>
    
    <select {{ $attributes->merge(['class' => 'p-2 text-gray-800 bg-white border border-gray-300 hover:border-gray-400 focus:border-gray-400 rounded w-full']) }}/>
        {{ $slot }}
    </select>
    
    @error($name)
        <p class='text-sm text-red-400 normal-case'>{{ $message }}</p>
    @enderror
</div>