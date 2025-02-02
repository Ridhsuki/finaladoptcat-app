<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Access to this page is forbidden. Please return to the home page or contact support if you believe this is an error.">
    <meta name="keywords" content="403 Forbidden, Access Denied, Error Page">
    <meta name="author" content="AdoptACat Team">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="403 Forbidden - AdoptACat">
    <meta property="og:description"
        content="Access to this page is forbidden. Please return to the home page or contact support if you believe this is an error.">
    <meta property="og:image" content="https://via.placeholder.com/300">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="403 Forbidden - AdoptACat">
    <meta name="twitter:description"
        content="Access to this page is forbidden. Please return to the home page or contact support if you believe this is an error.">
    <meta name="twitter:image" content="https://via.placeholder.com/300">

    <title>403 Forbidden - AdoptACat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/616/616430.png" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center max-w-md mx-auto p-6">
            <!-- Image -->
            <img src="https://i.pinimg.com/originals/3c/21/77/3c217769347611cca2cf856df4830dd1.gif" alt="Forbidden"
                 class="w-64 h-64 mx-auto mb-6 rounded-xl shadow-lg">

            <!-- Title -->
            <h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-white">403 - Forbidden</h1>

            <!-- Description -->
            <p class="text-lg mb-4 text-gray-600 dark:text-gray-400">
                You do not have permission to access this page.
            </p>

            <!-- Buttons -->
            <div class="flex justify-center space-x-4">
                <!-- Back to Home -->
                <a href="{{ url('/') }}"
                   class="px-6 py-3 text-white bg-[#A67C52] hover:bg-[#8C5E35] rounded-lg text-sm font-medium transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2">
                    Go to Home
                </a>
                <!-- Back to Previous Page -->
                <a href="javascript:history.back()"
                   class="px-6 py-3 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm font-medium transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</body>

</html>
