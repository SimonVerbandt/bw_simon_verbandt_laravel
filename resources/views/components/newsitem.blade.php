<div class="newsitem">
    <a class="dark:text-gray-400 dark:hover:text-white dark:hover:underline"
        href="{{ route('news.show', ['slug' => $newsitem->slug]) }}">
        <h2>{{ $newsitem->title }}</h2>
    </a>
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
