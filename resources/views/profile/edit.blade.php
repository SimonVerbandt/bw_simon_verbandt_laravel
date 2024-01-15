<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full" >
                    <form method="post" action="{{route('profile.changeInfo')}}" >
                        @csrf
                        @method('post')
                        <div id="profile" class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{$user->name}}</h2>
                            @if(Auth::user()->avatar != null)
                            <img src="{{$user->avatar}}" alt="{{$user->name}}"/>
                            @else
                            <label for="avatar" class="text-gray-700">Upload your avatar here: </label>
                            <input type="file" name="avatar" id="avatar">
                            @endif
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{__('Birthday')}}</h2>
                        @if(Auth::user()->birthday == null)
                        <label for="birthday" class="text-gray-700">You didn't save your birthday. Edit here: </label>
                        <input type="date" name="birthday" id="birthday">
                        @endif
                        <p class="text-gray-700">{{$user->birthday}}</p>
                        <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{__('About Me')}}</h2>
                        @if(Auth::user()->about_me == null)
                        <label for="about-me" class="text-gray-700">You don't have an about me. Edit here: </label>
                        <textarea id="about-me" name="about-me" class="mt-1 block w-full"></textarea>
                        @endif
                        <p class="text-gray-700">{{$user->about_me}}</p>
                        <x-primary-button type="submit" class="btn btn-primary" >{{ __('Save') }}</x-primary-button>
                    </form>

                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    img{
        height: 5rem;
        width: 5rem;
    }
    textarea{
        height: 10rem;
    }
</style>
