<x-app-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="links">
                        <x-nav-link href="{{ route('users.create') }}">Create New User</x-nav-link>

                    </div>
                    <ul>
                        @foreach ($users as $user)
                            <div class="mb-4 ">
                                <div class="flex justify-between mb-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                                </div>
                                <p class="text-gray-700 text-base">Date of birth: {{ $user->birthday }}</p>
                                <p class="text-gray-700 text-base">Email: {{ $user->email }}</p>
                                @php
                                    if($user -> isAdmin == true){
                                        $display = "Yes";
                                    }else{
                                        $display = "No";
                                    }
                                @endphp
                                <p class="text-gray-700 text-base">Admin: {{ $display }}</p>
                                <div class="mt-6 flex justify-end" style="border-bottom: 1px solid black">
                                        <form action="{{ route('users.update', ['name' => $user->name]) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                           <x-primary-button
                                                href="{{ route('users.update', ['name' => $user->name]) }}"
                                                style="margin-bottom: 10px" style="margin-right: 2rem">Promote/Demote</x-primary-button>
                                        </form>
                                    <form action="{{ route('users.destroy', ['name' => $user->name]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')<x-danger-button
                                            href="{{ route('users.destroy', ['name' => $user->name]) }}"
                                            style="margin-bottom: 10px">Delete</x-danger-button>
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
        display: flex;
        justify-content: space-between;
    }
</style>
