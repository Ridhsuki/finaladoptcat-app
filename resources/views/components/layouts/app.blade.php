<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.globalpets.com.my/data/cms/images/1598935115_peticon-cat.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/lazyload@8.0.0/lazyload.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Login/Register' }} | AdoptACat</title>
    @livewireStyles
    <style>
        ::selection {
            background-color: #D6A760;
            color: #FAF3E3;
        }
    </style>
</head>
<body>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>

</html>
