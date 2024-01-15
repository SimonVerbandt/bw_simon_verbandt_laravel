<section>

<div class="profile-form" >
    <form method="post" action="{{route('profile.changeInfo', ['name' => $user->name])}}" enctype="multipart/form-data">
        @csrf
        @method('post')
                    <div class="avatar">
                        <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{__('Avatar')}}</h2>
                    @if($user->avatar != null)
                        <img src="{{$user->avatar}}" alt="{{$user->name}}"/>
                        <input type="file" name="avatar" id="avatar" >
                    @else
                        <input type="file" name="avatar" id="avatar">
                    @endif
            </div>


        <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{__('Birthday')}}</h2>
        @if($user->birthday == null)
        <label for="birthday" class="text-gray-700">You didn't save your birthday. Edit here: </label>
        <input type="date" name="birthday" id="birthday">
        @endif
        <p class="text-gray-700">{{$user->birthday}}</p>
        <div class="about-me">

            <h2 class="text-lg font-semibold text-gray-900 leading-tight mb-4">{{__('About Me')}}</h2>
            @if($user->about_me == null)
            <label for="about_me" class="text-gray-700">You don't have an about me. Edit here: </label>
            <textarea id="about_me" name="about_me" class="mt-1 block w-full"></textarea>
            @endif
            <textarea id="about_me" name="about_me" class="mt-1 block w-full" class="text-gray-700">{{$user->about_me}}</textarea>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

</div>
<style>
    .profile-form{
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .about-me{
        display: flex;
        flex-direction: column;
        margin-bottom: 2rem;
    margin-top: 2rem;}
    img{
        height: 5rem;
        width: 5rem;
    }
    textarea{
        height: 10rem;
    }
    .avatar{
        display: flex;
        flex-direction: column;
        margin-bottom: 2rem;

    }
</style>
</section>
