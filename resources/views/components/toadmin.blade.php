@if (auth()->check() && auth()->user()->role === 'admin')
    <div class="fixed bottom-5 right-5 z-50">
        <a href="/admin" data-tooltip-target="tooltip-left tooltip-animation" data-tooltip-placement="left"
            class="flex items-center justify-center w-16 h-16 bg-[#A67C52] text-white rounded-full shadow-lg hover:bg-[#8C5E35] transition-all duration-300">
            <svg class="w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2"
                    d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
    </div>
    <div id="tooltip-left tooltip-animation" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-mediumtext-gray-900 bg-[#D6A760] border border-gray-200 transition-opacity duration-300 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Access admin panel
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
@endif
