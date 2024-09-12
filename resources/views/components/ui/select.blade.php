@props(['name', 'label', 'options', 'placeholder' => '', 'required' => false, 'multiple' => false])

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
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ in_array($value, old($name, [])) ? 'selected' : '' }} class="p-2">
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>
</div>
