<x-app-admin>
<x-admin-form action="{{ route('faq.store') }}" enctype="{{null}}">
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
</x-admin-form>
</x-app-admin>
