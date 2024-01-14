<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="links">
                        <x-nav-link href="{{ route('news.create') }}">Create new article</x-nav-link>
                    </div>
                    <div class="p-6 text-gray-900">
                        <ul>
                            @foreach ($newsItems as $newsitem)
                                <x-newsitem :newsitem="$newsitem" />
                                <div class="mt-6 flex justify-end" style="border-bottom: 1px solid black">
                                    <a href="{{ route('news.edit', ['slug' => $newsitem->slug]) }}"
                                        style="margin-right: 20px; padding-left: 10px; padding-top: 5px">Edit</a>
                                    <form action="{{ route('news.destroy', ['slug' => $newsitem->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')<x-danger-button
                                            href="{{ route('news.destroy', ['slug' => $newsitem->slug]) }}"
                                            style="margin-bottom: 10px">Delete</x-danger-button>
                                    </form>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin>
<style>
    .links {
        color: black;
        border-bottom: 1px solid navy;
        border-radius: 5%;
        margin-bottom: 3rem;
    }
</style>
