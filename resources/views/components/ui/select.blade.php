@props(['name', 'label', 'options', 'placeholder' => '', 'required' => false, 'multiple' => false, 'value' => []])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="mt-2">
        <select
            id="{{ $name }}"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            {{ $multiple ? 'multiple' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'flex w-full text-sm bg-white border rounded-md border-neutral-300 focus:border-neutral-300' . ($multiple ? '' : ' px-3 py-2')]) }}
        >
            @if($placeholder && !$multiple)
                <option value="">{{ $placeholder }}</option>
            @endif
            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ in_array($optionValue, $value) ? 'selected' : '' }} class="p-2">
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>
    </div>
</div>
