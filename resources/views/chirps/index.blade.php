<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @dump($errors->all()) --}}
                    {{-- @dump($errors->get('message')) --}}
                    Chirps Form
                    <form method="POST" action="{{ route('chirps.store') }}">
                        @csrf
                        <textarea name="message" id="" cols="10" rows="1" placeholder="{{ __('What\'s on your mind?') }}" class="bg-transparent block reunded-md w-full border-gray-300 bg-white shadow-sm">{{ old('message') }}</textarea>
                        
                        <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                        
                        <x-primary-button class="mt-2">
                            {{ __('chirps') }}
                        </x-primary-button>
                        {{-- @error('message')
                            {{ $message }}
                        @enderror --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
