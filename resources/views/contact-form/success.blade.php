
@extends('layouts.app')
@section('content')
<div class="success">
    <h1>Thank you for your message!</h1>
    <p>We will get back to you as soon as possible.</p>
    <a href="{{ route('contact-form.show') }}">Back to contact form</a>
</div>
@endsection
