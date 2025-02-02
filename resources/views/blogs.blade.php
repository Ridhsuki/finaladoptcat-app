@section('title', 'Blogs')
<x-layout>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-8 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">
                Cat Lovers' Blog
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400 md:text-base">
                Explore articles, tips, and stories for every cat enthusiast.
            </p>
        </div>

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($blogs as $blog)
                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40"
                    href="{{ route('blog.details', $blog->id) }}">
                    <div class="aspect-w-16 aspect-h-11">
                        @if ($blog->blog_image)
                            <img src="{{ $blog->blog_image }}" alt="{{ $blog->title }}"
                                class="w-full h-48 object-cover mb-4 rounded-lg">
                        @else
                            <img src="https://static.vecteezy.com/system/resources/previews/002/398/966/large_2x/cute-chubby-cat-kitten-cartoon-doodle-seamless-pattern-free-vector.jpg"
                                alt="No Image" class="w-full h-48 object-cover mb-4 rounded-lg">
                        @endif
                    </div>
                    <div class="my-6">
                        <h3
                            class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            {{ $blog->title }}
                        </h3>
                        <p class="mt-5 text-gray-600 dark:text-neutral-400">
                            {!! Str::limit(strip_tags($blog->content), 150, '...') !!}
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-8 rounded-full" src="{{ asset('storage/' . $blog->user->profile_picture) }}"
                            alt="Avatar">
                        <div>
                            <h5 class="text-sm text-gray-800 dark:text-neutral-200">By {{ $blog->user->name }}</h5>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
</x-layout>
