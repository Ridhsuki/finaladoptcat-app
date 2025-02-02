<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Coming Soon page of the AdoptACat web application. This feature is under development to provide you with the best experience.">
    <meta name="keywords" content="Coming Soon, AdoptACat, Cat Adoption, Web Application, Feature in Development">
    <meta name="author" content="AdoptACat Team">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Coming Soon - AdoptACat">
    <meta property="og:description"
        content="This feature is under development. We're working hard to provide you with the best experience.">
    <meta property="og:image" content="https://via.placeholder.com/300">
    <meta property="og:url" content="https://adoptcat.ridhsuki.my.id/coming-soon">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Coming Soon - AdoptACat">
    <meta name="twitter:description"
        content="This feature is under development. We're working hard to provide you with the best experience.">
    <meta name="twitter:image" content="https://via.placeholder.com/300">

    <title>Coming Soon - AdoptACat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/616/616430.png" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        ::selection {
            background-color: #D6A760;
            color: #FAF3E3;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center max-w-md mx-auto p-6">
            <!-- Image -->
            <img src="https://i.pinimg.com/originals/3c/21/77/3c217769347611cca2cf856df4830dd1.gif" alt="Coming Soon" 
                 class="w-64 h-64 mx-auto mb-6 rounded-xl shadow-lg">

            <!-- Title -->
            <h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-white">Coming Soon!</h1>

            <!-- Description -->
            <p class="text-lg mb-4 text-gray-600 dark:text-gray-400">
                This feature is currently under development. We are working hard to deliver the best experience for you.
            </p>

            <!-- Support Action -->
            <p class="text-sm mb-8 text-gray-600 dark:text-gray-400">
                Want to support my work? Visit my <a href="https://github.com/Ridhsuki/" target="_blank" 
                class="text-blue-600 hover:underline font-medium">GitHub profile</a> and follow me for updates!
            </p>

            <!-- Back Button -->
            <a href="javascript:history.back()"
                class="px-6 py-3 text-white bg-[#A67C52] hover:bg-[#8C5E35] rounded-lg text-sm font-medium transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2">
                Go Back
            </a>
        </div>
    </div>
</body>

</html>
