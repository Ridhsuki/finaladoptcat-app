<div id="delete-account-modal"
    class="hs-overlay hidden fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
        <div
            class="bg-white rounded-lg shadow-lg w-full max-w-[90%] sm:max-w-xs md:max-w-sm lg:max-w-md xl:max-w-lg p-4 sm:p-6">
            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Confirm Account Deletion</h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">Are you sure you want to delete your account? This
                action cannot be undone.</p>
            <div class="mt-4 flex justify-end space-x-2">
                <!-- Cancel Button -->
                <button data-hs-overlay="#delete-account-modal"
                    class="py-2 px-4 bg-gray-200 rounded-md hover:bg-gray-300 text-sm sm:text-base">
                    Cancel
                </button>
                <!-- Delete Button -->
                <form action="{{ route('profile.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="logout-modal"
    class="hs-overlay hidden fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
        <div
            class="bg-white rounded-lg shadow-lg w-full max-w-[100%] sm:max-w-xs md:max-w-sm lg:max-w-md xl:max-w-lg p-4 sm:p-6">
            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Confirm Logout</h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">Are you sure you want to logout?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <!-- Cancel Button -->
                <button data-hs-overlay="#logout-modal"
                    class="py-2 px-4 bg-gray-200 rounded-md hover:bg-gray-300 text-sm sm:text-base">
                    Cancel
                </button>
                <!-- Logout Form -->
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="submit"
                        class="py-2 px-4 bg-gray-700 text-white rounded-md hover:bg-gray-800 text-sm sm:text-base">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
