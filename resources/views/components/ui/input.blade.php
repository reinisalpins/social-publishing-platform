@props(['type' => 'text', 'name', 'label', 'placeholder' => '', 'required' => false])

<div class="w-full">
    @if(isset($label))
        <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    <div>
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 placeholder:text-neutral-500 focus:border-neutral-300']) }}
            value="{{ old($name, $attributes->get('value')) }}"
        />
    </div>
</div>
