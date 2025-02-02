<div id="hs-create-post-modal"
    class="hs-overlay hidden fixed top-0 left-0 z-[80] w-full h-full bg-opacity-50 bg-black overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-create-post-modal-label">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
        <div
            class="w-full max-w-[450px] bg-[#F8F4ED] border border-[#D6A760] rounded-xl shadow-lg pointer-events-auto p-6 space-y-6 mx-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-[#D6A760]">
                <h3 id="hs-create-post-modal-label" class="font-bold text-[#4A3B2D] text-lg">
                    Create Post
                </h3>
                <!-- Close Button (X) -->
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-create-post-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <img src="https://media.tenor.com/kWlwZ9Hy6TAAAAAi/peach-goma-goma.gif" alt="Cute Cat"
                    class="w-24 h-24 rounded-full border border-[#D6A760] shadow-md">
                
                <p class="text-center text-[#4A3B2D] text-sm">Choose an option below to create your post:</p>

                <!-- Create Blog Button -->
                <button type="button"
                    class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg bg-[#D6A760] text-white hover:bg-[#B58C4C] focus:ring-2 focus:ring-[#D9C2A7] transition-colors duration-200"
                    onclick="window.location.href='{{ route('blogs.create') }}'">
                    Create Blog
                </button>

                <!-- Create Adoption Post Button -->
                <button type="button"
                    class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg bg-[#D6A760] text-white hover:bg-[#B58C4C] focus:ring-2 focus:ring-[#D9C2A7] transition-colors duration-200"
                    onclick="window.location.href='{{ route('adopt.create') }}'">
                    Create Adoption Post
                </button>
            </div>
        </div>
    </div>
</div>