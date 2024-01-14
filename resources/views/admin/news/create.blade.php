<x-app-admin>
    <x-admin-form action="{{route('news.create')}}" enctype="{{ 'multipart/form-data' }}">

            <div class="form-input">
                <label for="title">Title: </label>
                <x-text-input id="news-title" name="title" type="text" class="mt-1 block w-full"/>
            </div>
            <div class="form-input">
                <label for="content">Content: </label>
                <textarea id="news-content" name="content" class="mt-1 block w-full"></textarea>
            </div>
            <div class="form-control-file">
                <label for="image">Image: </label><br>
                <input type="file" name="image" id="news-image">
            </div>
            <div class="errors" id="errorMessage">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            </div>
    </x-admin-form>

</x-app-admin>
