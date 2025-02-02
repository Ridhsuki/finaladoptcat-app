<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'AdoptAcat') | AdoptAcat</title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="AdoptACat | Find Your Perfect Feline Friend">
    <meta name="description"
        content="Discover adorable cats looking for a loving home on AdoptACat. Browse cats, post your own, and connect with pet lovers. Find your furry friend today!">
    <meta name="keywords"
        content="Adopt a cat, adopt cats online, find cats for adoption, cat adoption platform, AdoptACat, adopt pets, adopt kittens">
    <meta name="author" content="Ridhsuki">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags (for social sharing) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="AdoptACat | Find Your Perfect Feline Friend">
    <meta property="og:description"
        content="Discover adorable cats looking for a loving home on AdoptACat. Browse cats, post your own, and connect with pet lovers. Find your furry friend today!">
    <meta property="og:image" content="https://www.globalpets.com.my/data/cms/images/1598935115_peticon-cat.png">
    <meta property="og:site_name" content="AdoptACat">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="https://www.globalpets.com.my/data/cms/images/1598935115_peticon-cat.png"
        type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Sembunyikan Bottom Nav di Desktop */
        @media (min-width: 768px) {
            .bottom-nav {
                display: none;
            }
        }

        /* Sembunyikan Menu Desktop di Mobile */
        @media (max-width: 767px) {
            .desktop-menu {
                display: none;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        ::selection {
            background-color: #D6A760;
            color: #FAF3E3;
        }
    </style>
</head>

<body class="h-full">
    <div class="min-h-full flex flex-col">
        <x-navbar></x-navbar>
        <main class="flex-1">
            {{ $slot }}
        </main>
        <x-bottom-nav></x-bottom-nav>
        <x-create-modal></x-create-modal>
        <x-logout-modal></x-logout-modal>
        <x-toadmin></x-toadmin>
    </div>
</body>

</html>
