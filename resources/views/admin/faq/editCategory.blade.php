<x-app-admin>
    <x-admin-form action="{{ route('faq.category.update', ['slug' => $category->slug]) }}" enctype=" null">
        <div class="form-input">
            <label for="name">Name: </label>
            <x-text-input id="faq-category-name" name="name" type="text" class="mt-1 block w-full"
                value="{{ $category->name }}" />
        </div>
        <div class="errors" id="errorMessage">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </x-admin-form>
</x-app-admin>
