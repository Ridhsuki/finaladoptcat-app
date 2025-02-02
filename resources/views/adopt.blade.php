@section('title', 'Adopt Cats')
<x-layout>
    <!-- Section Wrapper -->
    <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-8 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">
                Cats Looking for a Loving Home
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400 md:text-base">
                Explore cats looking for a forever home and meet your new best friend.
            </p>
        </div>
        <!-- Grid -->
        <!-- Modified grid classes for responsive layout -->
        <div class="grid grid-cols-2 gap-4 sm:gap-5 lg:grid-cols-3 lg:gap-6">
            <!-- Card -->
            @foreach ($cats as $cat)
                <div
                    class="group flex flex-col bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow dark:bg-gray-800">
                    <!-- Image -->
                    <div class="relative pt-[75%] rounded-t-lg overflow-hidden">
                        <img class="absolute top-0 left-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('storage/cat_photos/' . basename($cat->photo_url)) }}" alt="{{ $cat->name_cat }}">
                    </div>

                    <!-- Content -->
                    <div class="p-3 md:p-4 lg:p-5">
                        <h3
                            class="text-sm md:text-base lg:text-lg font-semibold text-gray-800 dark:text-white truncate">
                            {{ $cat->name_cat }}</h3>

                        <!-- Responsive text sizes -->
                        <p class="text-xs md:text-sm text-gray-600 dark:text-neutral-400 mt-1">
                            <span class="font-medium">Age:</span> {{ $cat->age }} months
                        </p>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-medium">Gender:</span> {{ $cat->gender }}
                        </p>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-medium">Location:</span> {{ $cat->location }}
                        </p>

                        <!-- Description with responsive text and limited lines -->
                        <p class="mt-2 text-xs md:text-sm text-gray-800 dark:text-neutral-200 line-clamp-2">
                            {{ Str::limit($cat->description, 40) }}
                        </p>

                        <!-- Status -->
                        <div class="mt-2 md:mt-3">
                            @if ($cat->status === 'available')
                                <span
                                    class="inline-block bg-green-100 text-green-700 text-xs font-medium rounded-full px-2 py-0.5 md:px-3 md:py-1">Available</span>
                            @else
                                <span
                                    class="inline-block bg-red-100 text-red-700 text-xs font-medium rounded-full px-2 py-0.5 md:px-3 md:py-1">Adopted</span>
                            @endif
                        </div>

                        <!-- Details Button -->
                        <div class="mt-3 md:mt-4 lg:mt-5">
                            <a href="{{ route('adopt.show', $cat->id) }}"
                                class="inline-block w-full text-center bg-[#A67C52] text-white text-xs md:text-sm font-medium rounded-md px-3 py-1.5 md:px-4 md:py-2 hover:bg-[#8C5E35] focus:ring focus:ring-[#D9C2A7] focus:outline-none transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Section Wrapper -->

    <style>
        /* Optional: Add these styles if you want to ensure text doesn't overflow */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Optional: Add smooth transitions for hover effects */
        .group {
            transition: all 0.3s ease;
        }

        /* Optional: Add a subtle lift effect on hover */
        .group:hover {
            transform: translateY(-2px);
        }
    </style>
</x-layout>
