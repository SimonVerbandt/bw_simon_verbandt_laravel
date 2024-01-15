<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Headlines') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @foreach ($articles as $article)
                    <div class="p-6 text-gray-900">
                        <x-article>
                            @if (isset($article->image))
                                <x-slot name="image">{{ $article->image }}</x-slot>
                            @endif
                            <x-slot name="url">{{ $article->url }}</x-slot>
                            <x-slot name="title">{{ $article->title }}</x-slot>
                            <x-slot name="abstract">{{ $article->abstract }}</x-slot>
                            <x-slot name="published_at">{{ $article->published_at }}</x-slot>
                        </x-article>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</x-app-layout>
