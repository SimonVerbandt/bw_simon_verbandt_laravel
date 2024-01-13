<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management Panel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-start space-between">
            <ul>

                <li><a href="{{ route('admin.contact-forms') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Manage Contact Messages') }}
                    </a></li>
                <li><a href="{{ route('admin.faq') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Manage FAQ') }}
                    </a></li>
                <li><a href="{{ route('admin.faq.category') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Manage FAQ-categories') }}
                    </a></li>
                <li><a href="{{ route('admin.news') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Manage Newsitems') }}
                    </a></li>
                <li><a href="{{ route('admin.users') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('Manage Users') }}
                    </a></li>
            </ul>
        </div>
    </div>
</x-app-admin>
