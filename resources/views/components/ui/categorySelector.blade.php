@props(['categories', 'selectedCategories' => []])

<div class="space-y-2">
    <label class="block text-sm font-medium leading-6 text-gray-900">Categories <span
            class="text-red-500">*</span></label>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach ($categories as $category)
            <div>
                <input type="checkbox"
                       id="category_{{ $category->getId() }}"
                       name="categories[]"
                       value="{{ $category->getId() }}"
                       class="hidden peer"
                    {{ in_array($category->getId(), old('categories', $selectedCategories)) ? 'checked' : '' }}>
                <label for="category_{{ $category->getId() }}"
                       class="inline-flex text-sm items-center justify-center w-full p-3 bg-white border border-gray-300 rounded-md cursor-pointer peer-checked:border-primary-800 peer-checked:text-primary-800">
                    <div class="block">
                        <div class="w-full text-center font-medium">{{ $category->getName() }}</div>
                    </div>
                </label>
            </div>
        @endforeach
    </div>
</div>
