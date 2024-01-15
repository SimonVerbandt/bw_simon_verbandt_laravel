<x-guest-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('FAQ') }}
    </h2>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="category-dropdown">
                <x-dropdown >
                    <x-slot name="trigger">
                        <button
                            class="py-2 pl-3 pr-9 text-sm font-semibold w-auto lg:w-32 text-left flex lg:inline-flex">
                            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach ($categories as $category)
                            <div style="margin: 0.5rem 0.5rem 1rem 0.5rem;">
                                <a href="{{ route('faq.category.show', ['slug' => $category->slug])}}" class="text-gray-700 text-base">{{ $category->name }}</p>
                            </div>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @foreach ($faqs as $faq )
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">{{ $faq->question }}</h3>
                    <p class="text-gray-700 text-base">{{ $faq->answer }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>

