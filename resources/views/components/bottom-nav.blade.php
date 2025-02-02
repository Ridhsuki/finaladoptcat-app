    <footer class="w-full mx-auto px-4 sm:px-6 lg:px-8 mt-auto">
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
    {{-- <div
        class="bottom-nav fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <!-- Home Button -->
            <button onclick="window.location.href='{{ route('adopt.index') }}'" data-tooltip-target="tooltip-home"
                type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-s-full group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6]">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Home</span>
            </button>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Blogs Button -->
            <button onclick="window.location.href='{{ route('blogs') }}'" data-tooltip-target="tooltip-wallet"
                type="button"
                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6]">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Blogs</span>
            </button>
            <div id="tooltip-wallet" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Blogs
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Post Button (Center Button) -->
            <div class="flex items-center justify-center">
                <button data-tooltip-target="tooltip-new" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 font-medium bg-[#D6A760] rounded-full group hover:bg-[#B58C4C] focus:ring-4 focus:ring-[#D6A760] dark:focus:ring-[#B58C4C]"
                    >
                    <svg class="w-4 h-4 text-white group-hover:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">Post</span>
                </button>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Create Post
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Notifications Button -->
            <button onclick="window.location.href='{{ route('notifications.index') }}'"
                data-tooltip-target="tooltip-settings" type="button"
                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6]">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                </svg>
                @if (auth()->check() && auth()->user()->notifications()->where('is_read', 0)->count() > 0)
                    <span
                        class="text-red-500">({{ auth()->user()->notifications()->where('is_read', 0)->count() }})</span>
                @endif
                <span class="sr-only">Notifications</span>
            </button>
            <div id="tooltip-settings" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Notifications
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Profile Button -->
            <button onclick="window.location.href='{{ route('profile.show') }}'" data-tooltip-target="tooltip-profile"
                type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-e-full group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6]">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="sr-only">Profile</span>
            </button>
            <div id="tooltip-profile" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Profile
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div> --}}
    <div
        class="bottom-nav fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <!-- Home Button -->
            <button onclick="window.location.href='{{ route('adopt.index') }}'"
                class="inline-flex flex-col items-center justify-center px-5 rounded-s-full group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6] 
            {{ request()->is('/') || request()->is('adopt*') ? 'bg-[#F4E3D6]' : '' }}">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Home</span>
            </button>

            <!-- Blogs Button -->
            <button onclick="window.location.href='{{ route('blogs') }}'"
                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6] 
            {{ request()->is('blogs*') || request()->is('blog.details*') ? 'bg-[#F4E3D6]' : '' }}">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Blogs</span>
            </button>

            <!-- Post Button (Center Button) -->
            <div class="flex items-center justify-center">
                <button data-tooltip-target="tooltip-new" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 font-medium bg-[#D6A760] rounded-full group hover:bg-[#B58C4C] focus:ring-4 focus:ring-[#D6A760] dark:focus:ring-[#B58C4C]" data-hs-overlay="#hs-create-post-modal">
                    <svg class="w-4 h-4 text-white group-hover:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">Post</span>
                </button>
            </div>
            <!-- Notifications Button -->
            <button onclick="window.location.href='{{ route('notifications.index') }}'"
                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6] relative  {{ request()->is('notifications*') ? 'bg-[#F4E3D6]' : '' }}">

                @if (auth()->check() && auth()->user()->notifications()->where('is_read', 0)->count() > 0)
                    <span
                        class="absolute z-10 top-[15px] right-[24px] inline-flex items-center justify-center w-4 h-4 text-xs font-medium text-white bg-red-500 rounded-full">
                        {{ auth()->user()->notifications()->where('is_read', 0)->count() }}
                    </span>
                @endif

                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760] relative"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                </svg>

                <span class="sr-only">Notifications</span>
            </button>



            <!-- Profile Button -->
            <button onclick="window.location.href='{{ route('profile.show') }}'"
                class="inline-flex flex-col items-center justify-center px-5 rounded-e-full group hover:bg-[#F4E3D6] dark:hover:bg-[#F4E3D6] 
            {{ request()->is('profile*') ? 'bg-[#F4E3D6]' : '' }}">
                <svg class="w-6 h-6 text-[#4A3B2D] dark:text-[#FAF3E3] group-hover:text-[#D6A760] dark:group-hover:text-[#D6A760]"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Profile</span>
            </button>
        </div>
    </div>
