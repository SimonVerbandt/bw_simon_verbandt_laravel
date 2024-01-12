@extends('layouts.app')

@section('content')
<h1>News</h1>
<ul>
    @foreach($newsItems as $newsitem)
      <li><x-newsitem :newsitem="$newsitem" /></li>
    @endforeach
</ul>
@endsection
