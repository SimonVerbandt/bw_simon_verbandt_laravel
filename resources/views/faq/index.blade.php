<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('FAQ') }}
    </h2>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul class="text-gray-700 text-base">
            <li><a href="{{ route('faq.category.show',['slug' => 'general']) }}">General</a></li>
            <li><a href="{{ route('faq.category.show', ['slug' =>'account-information']) }}">Account Information</a></li>
         </ul>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @yield('faq-content')
        </div>
    </div>
</x-app-layout>

