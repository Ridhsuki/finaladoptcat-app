{{-- <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Already have an account?
                            <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="/login">
                                Sign in here
                            </a>
                        </p>
                    </div>
                    <hr class="my-5 border-slate-300">
                    <!-- Form -->
                    <form wire:submit.prevent='save'>
                        <div class="grid gap-y-4">
                            <!-- Form Group -->

                            <div>
                                <label for="name" class="block text-sm mb-2 dark:text-white">Name</label>
                                <div class="relative">
                                    <input type="text" id="name" wire:model="name"
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        aria-describedby="email-error">
                                    @error('name')
                                        <div class=" absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('name')
                                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" wire:model="email"
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        aria-describedby="email-error">
                                    @error('email')
                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('email')
                                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>

                                </div>
                                <div class="relative">
                                    <input type="password" id="password" wire:model="password"
                                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        aria-describedby="password-error">
                                    @error('password')
                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('password')
                                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->


                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
                                up</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
    </div>
</div> --}}
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center justify-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6">
                <div class="p-4 pt-0 sm:p-7 sm:pt-1">
                    <div class="text-center mb-6">
                        <!-- Website Title -->
                        <a href="{{ url('/') }}">
                            <h1 class="text-2xl font-bold text-[#A67C52]">AdoptACat</h1>
                        </a>
                        <h2 class="block text-2xl font-bold text-gray-800 mt-2">Sign up</h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Already have an account?
                            <a class="text-[#A67C52] hover:text-[#8C5E35] font-medium" href="/login">
                                Sign in here
                            </a>
                        </p>
                    </div>

                    <hr class="my-5 border-slate-300">

                    <!-- Form -->
                    <form wire:submit.prevent='save'>
                        @if (session('error'))
                            <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 mb-4"
                                role="alert">
                                <span class="font-bold">Error!</span>
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="grid gap-y-4">

                            <!-- Form Group for Name -->
                            <div>
                                <label for="name" class="block text-sm mb-2">Name</label>
                                <div class="relative">
                                    <input type="text" id="name" wire:model="name"
                                        class="peer py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:ring-[#A67C52] focus:border-[#A67C52] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-[#A67C52] transition-all"
                                        aria-describedby="name-error">
                                    @error('name')
                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('name')
                                    <p class="text-xs text-red-600 mt-2" id="name-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group for Name -->

                            <!-- Form Group for Email -->
                            <div>
                                <label for="email" class="block text-sm mb-2">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" wire:model="email"
                                        class="peer py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:ring-[#A67C52] focus:border-[#A67C52] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-[#A67C52] transition-all"
                                        aria-describedby="email-error">
                                    @error('email')
                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('email')
                                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group for Email -->

                            <!-- Form Group for Password -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2">Password</label>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" wire:model="password"
                                        class="peer py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:ring-[#A67C52] focus:border-[#A67C52] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-[#A67C52] transition-all"
                                        aria-describedby="password-error">
                                    <!-- Eye Icon to Toggle Password Visibility -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                                        onclick="togglePasswordVisibility()">
                                        <svg id="eye-icon" class="h-5 w-5 text-gray-500 dark:text-gray-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7zM12 12l3-3m-3 3l-3-3" />
                                        </svg>
                                    </div>
                                    @error('password')
                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('password')
                                    <p class="text-xs text-red-600 mt-2" id="password-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group for Password -->

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#A67C52] text-white hover:bg-[#8C5E35] focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2 transition-colors duration-200">
                                Sign up
                            </button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');

        // Toggle the input type between 'password' and 'text'
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('d', 'M12 12l3-3m-3 3l-3-3');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('d',
                'M15 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7zM12 12l3-3m-3 3l-3-3');
        }
    }
</script>
