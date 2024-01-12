<div class="newsitem">
    <h2>{{ $newsitem->slug}})      {{ $newsitem->title }}</h2>


    <img src="{{ $newsitem->image }}" alt="{{ $newsitem->title }}">
    <p>{{ $newsitem->content }}</p>
    <p>{{ $newsitem->published_at }}</p>
</div>
<style>
    p {
        color: lightgrey;
    }

    img {
        width: 25rem;
        height: 15rem;
    }
</style>
