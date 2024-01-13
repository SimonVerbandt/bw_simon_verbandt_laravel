<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($newsItems as $newsitem)
                            <li><x-newsitem :newsitem="$newsitem" /></li>
                            <a href="{{ route('news.edit'), ['slug' => $newsitem->slug]}}">Edit</a>//TODO:fix logic for editing
                            <x-primary-button href="{{ route('news.destroy'), ['slug' => $newsitem->slug] }}">Delete</x-primary-button>//TODO:fix logic for deletion
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-admin>
