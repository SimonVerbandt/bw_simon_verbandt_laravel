<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message sent!') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <h1>Thank you for your message!</h1>
                <p>We will get back to you as soon as possible.</p>
                <a href="{{ route('contact-form.show') }}">Back to contact form</a>
            </div>
        </div>
    </div>
</x-app-layout>
