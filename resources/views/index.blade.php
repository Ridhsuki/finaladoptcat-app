<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdoptACat | Find Your Perfect Feline Friend">
    <meta name="description"
        content="Discover adorable cats looking for a loving home on AdoptACat. Browse cats, post your own, and connect with pet lovers. Find your furry friend today!">
    <meta name="keywords"
        content="Adopt a cat, adopt cats online, find cats for adoption, cat adoption platform, AdoptACat, adopt pets, adopt kittens">
    <meta name="author" content="Ridhsuki">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="AdoptACat | Find Your Perfect Feline Friend">
    <meta property="og:description"
        content="Discover adorable cats looking for a loving home on AdoptACat. Browse cats, post your own, and connect with pet lovers. Find your furry friend today!">
    <meta property="og:site_name" content="AdoptACat">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>AdoptACat | Ridhsuki</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="https://www.globalpets.com.my/data/cms/images/1598935115_peticon-cat.png"
        type="image/x-icon">
</head>

<body class="h-full">
    <div class="min-h-full">
        <main>
            <div class="bg-[#FAF3E3] text-[#4A3B2D]">
                <!-- Hero Section -->
                <header class="relative bg-[#FAF3E3]">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between py-6">
                            <!-- Logo -->
                            <a href="{{ url('/') }}">
                                <div class="text-2xl font-bold text-[#D6A760]">AdoptACat</div>
                            </a>
                            <!-- Navigation -->
                            <div class="hidden md:flex space-x-6">
                                <a href="{{ route('login') }}" class="text-[#4A3B2D] hover:text-[#D6A760]">Browse
                                    Cats</a>
                                <a href="{{ route('comingsoon') }}" class="text-[#4A3B2D] hover:text-[#D6A760]">How It
                                    Works</a>
                            </div>
                            <!-- CTA Button -->
                            <a href="{{ route('login') }}"
                                class="px-5 py-2 bg-[#D6A760] text-white font-medium rounded-lg shadow-lg hover:bg-[#B58C4C]">
                                Get Started
                            </a>
                        </div>
                    </div>
                </header>

                <section class="relative bg-[#FAF3E3] overflow-hidden">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col lg:flex-row items-center lg:space-x-12 py-16">
                            <!-- Text Content -->
                            <div class="lg:w-1/2 text-center lg:text-left">
                                <h1 class="text-4xl sm:text-5xl font-extrabold text-[#4A3B2D] mb-6">
                                    Find Your Perfect <span class="text-[#D6A760]">Feline Friend</span>
                                </h1>
                                <p class="text-lg text-[#6B5D4B] mb-8">
                                    AdoptACat connects loving families with adorable cats looking for a forever home.
                                    Post
                                    or
                                    adopt
                                    with ease.
                                </p>
                                <div class="flex justify-center lg:justify-start space-x-4">
                                    <a href="{{ route('adopt.index') }}"
                                        class="px-5 py-3 bg-[#D6A760] text-white font-medium rounded-lg shadow-lg hover:bg-[#B58C4C]">
                                        Browse Cats
                                    </a>
                                    <a href="{{ route('login') }} "
                                        class="px-5 py-3 bg-white text-[#D6A760] border border-[#D6A760] font-medium rounded-lg hover:bg-[#FAE9D5]">
                                        Post a Cat
                                    </a>
                                </div>
                            </div>
                            <!-- Hero Image -->
                            <div class="lg:w-1/2 mt-8 lg:mt-0 relative">
                                <img src="{{ asset('hero.jpeg') }}" alt="Cute cat"
                                    class="rounded-lg shadow-lg object-cover w-full h-70">
                                <!-- Animated Decorations -->
                                <div
                                    class="absolute -top-10 -left-10 w-16 h-16 bg-[#F4E3D6] rounded-full animate-float">
                                </div>
                                <div
                                    class="absolute -bottom-12 -right-8 w-20 h-20 bg-[#F4DCC0] rounded-full animate-float">
                                </div>
                                <div
                                    class="absolute top-0 right-0 w-14 h-14 bg-[#D6A760] rounded-full opacity-50 animate-float">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Background Decorations -->
                    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
                        <div
                            class="absolute top-0 left-0 w-72 h-72 bg-[#F4E3D6] rounded-full opacity-50 transform translate-x-[-50%] translate-y-[-50%]">
                        </div>
                        <div
                            class="absolute bottom-0 right-0 w-96 h-96 bg-[#F4DCC0] rounded-full opacity-30 transform translate-x-[50%] translate-y-[50%]">
                        </div>
                    </div>
                </section>
                <footer class="bg-[#4A3B2D] text-[#FAF3E3]">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div
                            class="hidden md:flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                            <!-- Logo -->
                            <div class="text-xl font-bold">AdoptACat</div>
                            <!-- Footer Links -->
                            <div class="flex space-x-6">
                                <a href="{{ route('comingsoon') }}" class="text-[#FAF3E3] hover:text-[#D6A760]">About
                                    Us</a>
                                <a href="{{ route('comingsoon') }}" class="text-[#FAF3E3] hover:text-[#D6A760]">Privacy
                                    Policy</a>
                                <a href="{{ route('comingsoon') }}" class="text-[#FAF3E3] hover:text-[#D6A760]">Terms
                                    of
                                    Service</a>
                                <a href="{{ route('comingsoon') }}"
                                    class="text-[#FAF3E3] hover:text-[#D6A760]">Help</a>
                                <a href="https://github.com/Ridhsuki/" target="_blank"
                                    class="text-[#FAF3E3] hover:text-[#D6A760]">GitHub</a>
                            </div>
                            <!-- Copyright -->
                            <div class="text-sm text-[#F4E3D6]">© 2024 AdoptACat. All rights reserved.</div>
                        </div>
                        <!-- Mobile Version -->
                        <div class="flex flex-col md:hidden text-center space-y-2 text-xs">
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="{{ route('comingsoon') }}" class="hover:text-[#D6A760]">About Us</a>
                                <a href="{{ route('comingsoon') }}" class="hover:text-[#D6A760]">Privacy Policy</a>
                                <a href="{{ route('comingsoon') }}" class="hover:text-[#D6A760]">Terms</a>
                                <a href="{{ route('comingsoon') }}" class="hover:text-[#D6A760]">Help</a>
                                <a href="https://github.com/Ridhsuki/" target="_blank"
                                    class="hover:text-[#D6A760]">GitHub</a>
                            </div>
                            <div class="text-[#F4E3D6]">
                                © 2024 AdoptACat. All rights reserved.
                            </div>
                        </div>
                </footer>
            </div>
        </main>
    </div>
    @auth
        <script>
            window.location.href = '{{ url('/adopt') }}';
        </script>
    @endauth

</body>

</html>
