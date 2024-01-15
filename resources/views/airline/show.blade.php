<x-app-layout>
    {{-- Create layout to display a list of airlines, with their names --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $airline->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (isset($airline->logo))
                        <img src="{{ asset('airlines-logos-dataset-master/images/' . $airline->icao_code . '.png') }}"
                            alt="{{ $airline->name }}" class="w-40 h-40 rounded mx-auto">
                    @endif
                </div>
                <div class="p-6 text-gray-900" id="airline">
                    @if (isset($airline->icao_code))
                        <div>
                            <h1 class="text-2xl font-semibold" id="link_air">ICAO code: {{ $airline->icao_code }}</h1>
                        </div>
                    @endif
                    @if (isset($airline->iata_code))
                        <div>
                            <h1 class="text-2xl font-semibold" id="link_air">IATA code: {{ $airline->iata_code }}</h1>
                        </div>
                    @endif
                    @if (isset($airline->fleet_size))
                        <div>
                            <h1 class="text-2xl font-semibold" id="link_air">Fleet size: {{ $airline->fleet_size }}
                            </h1>
                        </div>
                    @endif
                </div>
                @if($articles)
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
                @else
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold">No articles for this airline...</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
