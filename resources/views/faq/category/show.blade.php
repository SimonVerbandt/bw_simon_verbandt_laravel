@extends('faq.index')
@section('faq-content')
@if($slug === 'general')
    <h2>General</h2>
@elseif($slug ==='account-information')
    <h2>Account</h2>
@endif

@foreach ($faqs as $faq)
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4">
    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold mb-2">{{ $faq->question }}</h3>
        <p class="text-gray-700 text-base">{{ $faq->answer }}</p>
    </div>
</div>
@endforeach
@endsection
