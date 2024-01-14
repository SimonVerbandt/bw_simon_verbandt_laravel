<div class="newsitem">

    <h1 class="font-extrabold mb-8">{{ $newsitem->title }}</h1>

    <img src="{{ $newsitem->image }}" alt="{{ $newsitem->title }}">
    <p>{{ $newsitem->content }}</p>
    <p>{{ $newsitem->published_at }}</p>
</div>
<style>
    h1{
        margin-top:0.5rem;
        font-size: 2rem;
    }
    p {
        margin-top:1rem;
        color: grey;
    }

    img {
        margin-top: 2rem;
        width: 25rem;
        height: 15rem;
    }
</style>
