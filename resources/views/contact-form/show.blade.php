<x-guest-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Contact us') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <x-contactform />
        </div>
    </div>
</div>
</x-guest-layout>




