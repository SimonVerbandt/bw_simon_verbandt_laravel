<x-app-admin>
    <form method="POST" action="{{ route('faq.store') }}">
            @csrf
            @method('POST')
            <div class="form-input">
                <label for="question">Question: </label>
                <x-text-input id="faq-question" name="question" type="text" class="mt-1 block w-full"/>
            </div>
            <div class="form-input">
                <label for="answer">Answer: </label>
                <textarea id="faq-answer" name="answer" class="mt-1 block w-full"></textarea>
            </div>
            <div class="form-input">
                <label for="category">Category: </label>
                <select id="faq-category" name="category" class="mt-1 block w-50">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-primary-button type="submit" style="align-self:end;margin-top: 2rem; margin-right:1rem;">Post</x-primary-button>
        </form>
        <div class="errors" id="errorMessage">
            @error('question')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('answer')
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
            form{
                display: flex;
                flex-direction: column;
            }
            label, textarea, select, input{
                padding: 1rem;
            }
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

