@section('title', 'Your Profile')
<x-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-neutral-200">Profile</h1>
        <!-- Profile -->
        <div class="flex items-center justify-between gap-x-3">
            <div class="flex items-center gap-x-3">
                <div class="shrink-0">
                    <img class="w-16 h-16 rounded-full shadow-md"
                        src="{{$user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://harvesthosts-marketing-assets.s3.amazonaws.com/wp-content/uploads/2021/11/whoknows-1.jpg' }}"
                        alt="Avatar">
                </div>
                <div>
                    <h1 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
                        {{ $user->name }}
                    </h1>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ $user->bio ?? 'User bio is not provided.' }}
                    </p>
                </div>
            </div>
            <!-- Dropdown -->
            <div class="relative">
                <button id="dropdownProfileButton"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Profile settings</span>
                </button>
                <div id="dropdownProfileMenu"
                    class="hidden absolute right-0 mt-2 z-10 w-36 bg-white rounded-lg shadow divide-y divide-gray-100 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownProfileButton">
                        <li>
                            <a href="{{ route('user.posts') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage
                                Posts</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile
                                settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Dropdown -->
        </div>
        <!-- End Profile -->

        <!-- About -->
        <div class="mt-8">
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ $user->about ?? 'No description available.' }}
            </p>
        </div>
        <!-- End About -->

        <!-- Projects (Adopt Posts) -->
        <div class="mt-10 sm:mt-14">
            <h2 class="mb-5 font-medium text-gray-800 dark:text-neutral-200">Adopt Posts</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                @forelse ($adoptPosts as $post)
                    <a class="group block relative overflow-hidden rounded-lg shadow-md"
                        href="{{ route('adopt.show', $post->id) }}">
                        <img class="w-full h-40 object-cover bg-gray-100 rounded-lg dark:bg-neutral-800"
                            src="{{ asset('storage/cat_photos/' . basename($post->photo_url)) }}"
                            alt="{{ $post->name_cat }}">
                        <div
                            class="absolute bottom-1 right-1 opacity-0 group-hover:opacity-100 transition bg-white text-gray-800 dark:bg-neutral-900 dark:text-neutral-200 py-1 px-2 rounded-lg shadow">
                            <span class="text-xs">View</span>
                        </div>
                    </a>
                @empty
                    <p class="text-sm text-gray-500 dark:text-neutral-500">No adopt posts found.</p>
                @endforelse
            </div>
        </div>
        <!-- End Projects -->

        <!-- Articles -->
        <div class="my-10 sm:my-14">
            <h2 class="mb-5 font-medium text-gray-800 dark:text-neutral-200">Articles</h2>
            <ul class="space-y-6">
                @forelse ($blogPosts as $blog)
                    <li>
                        <p class="mb-2 text-sm text-gray-500 dark:text-neutral-500">
                            {{ $blog->created_at->format('Y') }}</p>
                        <h5 class="font-medium text-gray-800 dark:text-neutral-200">{{ $blog->title }}</h5>
                        <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">{{ $blog->excerpt }}</p>
                        <p class="mt-1">
                            <a class="text-sm text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400"
                                href="{{ route('blog.details', $blog->id) }}">
                                Continue reading
                            </a>
                        </p>
                    </li>
                @empty
                    <p class="text-sm text-gray-500 dark:text-neutral-500">No articles found.</p>
                @endforelse
            </ul>
        </div>
        <!-- End Articles -->
    </div>

    <script>
        document.getElementById('dropdownProfileButton').addEventListener('click', function() {
            const menu = document.getElementById('dropdownProfileMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</x-layout>