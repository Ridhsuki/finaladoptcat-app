<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Blog Details | AdoptACat</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/616/616430.png" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Sembunyikan Bottom Nav di Desktop */
        @media (min-width: 768px) {
            .bottom-nav {
                display: none;
            }
        }

        ::selection {
            background-color: #D6A760;
            color: #FAF3E3;
        }
    </style>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <!-- Blog Article -->
        <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
            <div class="max-w-2xl">
                <!-- Avatar Media -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex w-full sm:items-center gap-x-5 sm:gap-x-3">
                        <div class="shrink-0">
                            <img class="size-12 rounded-full" src={{ asset('storage/' . $post->user->profile_picture) }}
                                alt="Avatar">
                        </div>

                        <div class="grow">
                            <div class="flex justify-between items-center gap-x-2">
                                <div>
                                    <!-- Tooltip -->
                                    <div class="hs-tooltip [--trigger:hover] [--placement:bottom] inline-block">
                                        <div class="hs-tooltip-toggle sm:mb-1 block text-start">
                                            <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $post->user->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- End Tooltip -->

                                    <ul class="text-xs text-gray-500 dark:text-neutral-500">
                                        <li
                                            class="inline-block relative pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </li>
                                    </ul>
                                </div>

                                <!-- Button Group -->
                                <div>
                                    <button type="button" onclick="window.location.href='/coming-soon';"
                                        class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                        <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        View Author
                                    </button>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Avatar Media -->

                <!-- Content -->
                <div class="space-y-5 md:space-y-8">
                    @if ($post->blog_image)
                        <img src="{{ $post->blog_image }}" alt="{{ $post->title }}"
                            class="w-full h-48 object-cover mb-4 rounded-lg">
                    @else
                        <img src="https://static.vecteezy.com/system/resources/previews/002/398/966/large_2x/cute-chubby-cat-kitten-cartoon-doodle-seamless-pattern-free-vector.jpg"
                            alt="No Image" class="w-full h-48 object-cover mb-4 rounded-lg">
                    @endif
                    <div class="space-y-3">
                        <h2 class="text-2xl font-bold md:text-3xl dark:text-white">{{ $post->title }}</h2>
                    </div>

                    {!! $post->content !!}

                </div>
                <!-- End Content -->

                <div class="border-t-2 border-gray-300 my-8"></div>

                <x-comments :comments="$post->comments" :post="$post"></x-comments>
            </div>
        </div>
        <!-- End Blog Article -->
        <footer class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-6 border-t border-gray-200 dark:border-neutral-700">
                <div class="flex flex-wrap justify-between items-center gap-2">
                    <div>
                        <p class="text-xs text-gray-600 dark:text-neutral-400">
                            © 2024 AdoptAcat.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <x-bottom-nav></x-bottom-nav>
        <x-create-modal></x-create-modal>
</body>

</html>
