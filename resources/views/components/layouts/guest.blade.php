<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Social Publishing Platform' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<main class="px-2 md:px-0 container mx-auto">
    {{ $slot }}
</main>
</body>
</html>
