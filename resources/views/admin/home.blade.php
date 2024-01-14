<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="title">
                        <h1 class="">Choose your operation: </h1>
                    </div>
                    <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8 flex justify-start space-between">
                        <ul>

                            <li><x-nav-link href="{{ route('admin.contact-forms') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                    {{ __('Manage Contact Messages') }}
                            </x-nav-link></li>
                            <li><x-nav-link href="{{ route('admin.faq') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                    {{ __('Manage FAQ') }}
                                </x-nav-link></li>
                            <li><x-nav-link href="{{ route('admin.news') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                    {{ __('Manage Newsitems') }}
                                </x-nav-link></li>
                            <li><x-nav-link href="{{ route('admin.users') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                    {{ __('Manage Users') }}
                                </x-nav-link></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin>
