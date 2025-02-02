<nav class="bg-[#FAF3E3] border-b border-[#D6A760] dark:bg-gray-900 sticky top-0 z-50">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <!-- Logo dan Judul Aplikasi -->
        <a href="{{ url('/') }}">
            <span class="text-2xl font-semibold text-[#4A3B2D] dark:text-white">AdoptACat</span>
        </a>
        <div class="flex items-center space-x-4 md:space-x-6">

            <!-- Menu tambahan khusus desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Home -->
                <a href="{{ route('adopt.index') }}"
                    class="group {{ request()->routeIs('adopt.index') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }}">
                    <svg class="w-6 h-6 {{ request()->routeIs('adopt.index') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }} dark:text-white group-hover:text-[#D6A760]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
                <!-- Blogs -->
                <a href="{{ route('blogs') }}"
                    class="group {{ request()->is('blogs*') || request()->is('blog.details*') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }}">
                    <svg class="w-6 h-6 {{ request()->routeIs('blogs') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }} dark:text-white group-hover:text-[#D6A760]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" />
                    </svg>
                    <span class="sr-only">Blogs</span>
                </a>
                <!-- Create Post -->
                <a href="#create" class="group" data-hs-overlay="#hs-create-post-modal">
                    <svg class="w-6 h-6 text-[#4A3B2D] dark:text-white group-hover:text-[#D6A760]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">Create Post</span>
                </a>
                <!-- Notifications -->
                <a href="{{ route('notifications.index') }}"
                    class="group relative {{ request()->routeIs('notifications.index') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }}">
                    @if (auth()->check() && auth()->user()->notifications()->where('is_read', 0)->count() > 0)
                        <span
                            class="absolute top-0 right-0 block w-3 h-3 text-[8px] font-semibold text-white bg-red-600 rounded-full flex items-center justify-center">
                            {{ auth()->user()->notifications()->where('is_read', 0)->count() }}
                        </span>
                    @endif
                    <svg class="w-6 h-6 {{ request()->routeIs('notifications.index') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }} dark:text-white group-hover:text-[#D6A760]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                    </svg>
                    <span class="sr-only">Notifications</span>
                </a>

                <!-- Profile -->
                <a href="{{ route('profile.show') }}"
                    class="group {{ request()->is('profile*') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }}">
                    <svg class="w-6 h-6 {{ request()->routeIs('profile.show') ? 'text-[#D6A760]' : 'text-[#4A3B2D]' }} dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Profile</span>
                </a>
            </div>
        </div>

    </div>
</nav>

