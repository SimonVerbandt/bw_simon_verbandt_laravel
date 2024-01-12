@extends('layouts.app')

@section('content')
@foreach($newsItems as $newsitem)
    <x-newsitem :newsitem="$newsitem" />
@endforeach
@endsection
