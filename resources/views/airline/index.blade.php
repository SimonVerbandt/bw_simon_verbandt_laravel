<x-app-layout>
    {{-- Create layout to display a list of airlines, with their names --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airlines list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="list">
                @foreach ($airlines as $airline)
                    <div class="p-6 text-gray-900" id="airline">

                        @if (isset($airline->logo))
                            <img src="{{ asset('airlines-logos-dataset-master/images/'. $airline->icao_code . '.png') }}" alt="{{ $airline->name }}" class="w-40 h-40 rounded mx-auto">
                        @endif
                        <div>
                            <a href="{{route('airline.show', ['name' => $airline->name])}}" class="text-2xl font-semibold" id="link_air">{{ $airline->name }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    #list {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
    }

    #link_air:hover {
        border-bottom: 0.5px solid black;
    }
</style>
