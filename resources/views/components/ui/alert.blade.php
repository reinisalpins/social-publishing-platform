@props(['type' => 'info', 'title' => '', 'message' => '', 'class' => ''])

@php
    $baseClasses = "relative w-full rounded-lg border border-transparent p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white";
    $typeClasses = [
        'info' => 'bg-blue-600',
        'success' => 'bg-green-800',
        'warning' => 'bg-yellow-600',
        'error' => 'bg-red-600',
    ];
@endphp

<div class="{{ $baseClasses }} {{ $typeClasses[$type] }} {{ $class }}">
    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
    </svg>
    @if($title)
        <h5 class="mb-4 font-medium leading-none tracking-tight">{{ $title }}</h5>
    @endif
    <div class="text-xs">
        @if($slot->isNotEmpty())
            {{ $slot }}
        @else
            {{ $message }}
        @endif
    </div>
</div>
