<div class="contact-form">
    <form action="{{ route('contact-form.submit') }}" method="POST">
        @csrf
        <div class="form-input">
            <label for="subject">Subject: </label>
            <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <div class="form-textarea">
            <label for="content">Content: </label>
            <textarea type="text" name="content" id="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    <div class="errors">
        @error('subject')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
