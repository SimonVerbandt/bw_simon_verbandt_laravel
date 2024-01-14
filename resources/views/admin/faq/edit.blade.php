<x-app-admin>
    <x-admin-form :action="route('faq.update', ['slug' => $faq->slug])" enctype=" null">


        <div class="form-input">
            <label for="question">Question: </label>
            <x-text-input id="faq-question" name="question" type="text" class="mt-1 block w-full"
                value="{{ $faq->question }}" />
        </div>

        <div class="form-input">
            <label for="answer">Answer: </label>
            <textarea id="faq-answer" name="answer" class="mt-1 block w-full">{{ $faq->answer }}</textarea>
        </div>

        <div class="form-input">
            <label for="category">Category: </label>
            <select name="category" id="faq-category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $faq->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
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
    </x-admin-form>
</x-app-admin>
