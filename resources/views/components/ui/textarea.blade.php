@props(['name', 'label', 'placeholder' => '', 'required' => false, 'rows' => 3])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="mt-2">
        <textarea
            id="{{ $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'flex w-full px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 placeholder:text-neutral-500 focus:border-neutral-300']) }}
        >{{ old($name, $attributes->get('value')) }}</textarea>
    </div>
</div>
