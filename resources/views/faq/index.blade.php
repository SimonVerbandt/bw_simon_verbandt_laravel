@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('FAQ') }}
    </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-gray-700 text-base">Frequently Asked Questions</p>
        <ul class="text-gray-700 text-base">
            <li><a href="{{ route('faq.category.show',['slug' => 'general']) }}">General</a></li>
            <li><a href="{{ route('faq.category.show', ['slug' =>'account-information']) }}">Account Information</a></li>
         </ul>
        </div>

        @yield('faq-content')
    </div>
@endsection

