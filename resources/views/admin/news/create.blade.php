<x-app-admin>
    <form method="POST" action="{{ route('news.store') }}">
            @csrf
            @method('POST')
            <div class="form-input">
                <label for="title">Title: </label>
                <x-text-input id="news-title" name="title" type="text" class="mt-1 block w-full"/>
            </div>
            <div class="form-input">
                <label for="content">Content: </label>
                <textarea id="news-content" name="content" class="mt-1 block w-full"></textarea>
            </div>
            <div class="form-control-file">
                <label for="image">Image: </label>
                <input type="file" name="image" id="news-image">
            </div>
            <x-primary-button type="submit" style="margin-left: 75rem; margin-top: 2rem; margin-right:0;">Post</x-primary-button>
        </form>
        <div class="errors" id="errorMessage">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('errorMessage').innerHTML = '';
            }, 2000);
        </script>
        <style>
            #errorMessage{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 10px;
            }

            .alert{
                color: red;
                margin-bottom: 1rem;
            }

            textarea{
                height: 200px;
                border-radius: 1%;
            }
        </style>
</x-app-admin>
{{-- TODO:Complete layout  --}}
