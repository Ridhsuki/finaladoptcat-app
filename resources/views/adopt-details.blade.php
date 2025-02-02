@section('title', 'Cat details')
<x-layout>
    <div class="max-w-7xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
        <div class="bg-white">
            <!-- Main container -->
            <div class="flex flex-col lg:flex-row lg:gap-12">
                <!-- Gambar Kucing -->
                <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:px-8 lg:w-1/2">
                    <img src="{{ asset('storage/cat_photos/' . basename($cat->photo_url)) }}" alt="{{ $cat->name_cat }}"
                        class="w-full h-96 lg:h-[600px] object-cover rounded-lg">
                </div>

                <!-- Info dan Deskripsi Kucing -->
                <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:w-1/2 lg:px-8">
                    <!-- Judul -->
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl mb-4">{{ $cat->name_cat }}
                    </h1>

                    <!-- Info Kucing -->
                    <div class="space-y-4 mb-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Age</p>
                                <p class="text-base font-medium text-gray-900">{{ $cat->age }} months</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Gender</p>
                                <p class="text-base font-medium text-gray-900">{{ ucfirst($cat->gender) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Location</p>
                                <p class="text-base font-medium text-gray-900">{{ $cat->location }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Status</p>
                                <p class="text-base font-medium text-gray-900">{{ ucfirst($cat->status) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Adopt Now -->
                    <div class="mb-8">
                        <a href="{{ route('adopt.wa', $cat->id) }}" target="_blank"
                            class="w-full inline-flex items-center justify-center rounded-md border border-transparent bg-[#A67C52] px-8 py-3 text-base font-medium text-white hover:bg-[#8C5E35] focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2 transition-colors duration-200">
                            Adopt Now
                        </a>
                    </div>

                    <!-- Deskripsi Kucing -->
                    <div class="border-t border-gray-200 pt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                        <p class="mb-8 text-sm text-gray-600">{{ $cat->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (min-width: 1024px) {
            .prose {
                max-width: none;
            }
        }
    </style>

</x-layout>
