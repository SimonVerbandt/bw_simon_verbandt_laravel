<x-app-admin>
    <x-admin-form action="{{ route('users.store') }}" enctype="multipart/form-data">
        <div class="form-input">
            <label for="name">Name: </label>
            <x-text-input id="user-name" name="name" type="text" class="mt-1 block w-full" />
        </div>
        <div class="form-input">
            <label for="email">Email: </label>
            <x-text-input id="user-name" name="email" type="email" class="mt-1 block w-full" />
        </div>
        <div class="form-input">
            <label for="password">Password: </label>
            <x-text-input id="user-password" name="password" type="password" class="mt-1 block w-full" />
        </div>
        <div class="form-input">
            <label for="birthday">Date of birth: </label>
            <x-text-input id="user-birthday" name="birthday" type="date" class="mt-1 block w-full" />
        </div>
        <div class="form-control-file">
            <label for="avatar">Avatar: </label><br>
            <input type="file" name="avatar" id="user-avatar">
        </div>
        <div class="form-textarea">
            <label for="about_me">About Me: </label>
            <textarea id="user-about-me" name="about_me" class="mt-1 block w-full"></textarea>
        </div>
        <div class="form-input">
            <label for="isAdmin">Admin: </label>
            <select name="isAdmin" id="user-admin" class="mt-1 block w-50" style="width:5rem;">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="errors" id="errorMessage">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('admin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
    </x-admin-form>
</x-app-admin>
