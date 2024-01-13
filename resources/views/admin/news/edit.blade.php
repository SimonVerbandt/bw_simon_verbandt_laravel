<div class="edit-news-form">
    <form action="{{ route('news.edit') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-input">
            <label for="title">News Item Title: </label>
            <x-text-input id="news-subject" name="subject" type="text" class="mt-1 block w-full" autocomplete="current-password"/>
        </div>
        <div class="form-textarea">
            <label for="content">Content: </label>
            <textarea id="contact-form-content" name="content" class="mt-1 block w-full" autocomplete="current-password"></textarea>
        </div>
        <div class="button">
            <x-primary-button type="submit" class="btn btn-primary" >{{ __('Send') }}</x-primary-button>
        </div>
    </form>
    <div class="errors">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<style>


    #contact-form-content{
        height: 200px;
        border-radius: 1%;
    }

    .contact-form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        }

    .button{
        margin-top: 10px;
        display: flex;
        justify-content: flex-end;
        margin-right: 10px;
    }

    .errors{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .alert{
        margin-bottom: 10px;
    }
    .alert-danger{
        color: red;
    }
</style>
