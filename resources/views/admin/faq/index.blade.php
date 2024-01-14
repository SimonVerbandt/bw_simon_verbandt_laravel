<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage FAQ') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="links">
                    <x-nav-link href="{{route('faq.create')}}" >Create FAQ</x-nav-link>
                    <x-nav-link href="{{route('faq.category.create')}}">Create FAQ Category</x-nav-link>
                    </div>
                    <ul>
                        @foreach ($faqs as $faq)
                            <div class="mb-4 ">
                                <div class="flex justify-between mb-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $faq->question }}</h3>
                                    <p class="text-gray-700 text-base" style="justify-self: flex-end">Category: {{ $faq->category_name }}</p>
                                </div>
                                <p class="text-gray-700 text-base">{{ $faq->answer }}</p>
                                <div class="mt-6 flex justify-end" style="border-bottom: 1px solid black">
                                    <a href="{{ route('faq.edit', ['slug' => $faq->slug]) }}" style="margin-right: 20px; padding-left: 10px; padding-top: 5px">Edit</a>
                                    <form action="{{ route('faq.destroy', ['slug' => $faq->slug]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')<x-danger-button
                                        href="{{ route('faq.destroy', ['slug' => $faq->slug]) }}" style="margin-bottom: 10px">Delete</x-danger-button>
                                    </form>
                                </div>

                            </div>
                        @endforeach
                    </ul>
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

