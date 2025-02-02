@section('title', 'Your Posts')
<x-layout>
    <div class="max-w-4xl mx-auto p-4 sm:p-6 rounded-lg">
        <h1 class="text-2xl sm:text-4xl font-bold text-center text-[#A67C52] mb-6 sm:mb-8">Your Posts</h1>

        <!-- Adoption Posts Section -->
        <h2 class="text-xl sm:text-2xl font-semibold mb-4 sm:mb-6 text-[#8C5E35]">Adoption Posts</h2>
        <ul class="space-y-4">
            @forelse ($adopsiPosts as $post)
                <li
                    class="p-4 bg-gray-50 rounded-xl shadow-md border border-gray-200 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <!-- Gambar Kucing -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/cat_photos/' . basename($post->cat->photo_url)) }}"
                            alt="{{ $post->cat->name_cat }}"
                            class="w-24 h-24 sm:w-16 sm:h-16 object-cover rounded-lg mx-auto sm:mx-0">
                    </div>

                    <!-- Detail Post -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-[#A67C52] truncate">
                                {{ $post->cat->name_cat }}
                            </span>
                            @if ($post->cat->status === 'available')
                                <span
                                    class="inline-block bg-green-100 text-green-700 text-xs font-medium rounded-full px-2 py-0.5 md:px-3 md:py-1">
                                    Available
                                </span>
                            @elseif ($post->cat->status === 'pending')
                                <span
                                    class="inline-block bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full px-2 py-0.5 md:px-3 md:py-1">
                                    Pending
                                </span>
                            @else
                                <span
                                    class="inline-block bg-red-100 text-red-700 text-xs font-medium rounded-full px-2 py-0.5 md:px-3 md:py-1">
                                    Adopted
                                </span>
                            @endif
                        </div>
                        <span class="text-sm text-gray-500 block truncate">
                            {{ ucfirst($post->status) }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-2">
                        <form action="{{ route('adopt.updateStatus', $post->id) }}" method="POST"
                            class="flex items-center gap-2 w-full sm:w-auto">
                            @csrf
                            @method('PUT')
                            <select name="status"
                                class="w-full sm:w-auto text-xs px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#D9C2A7]">
                                <option value="available" {{ $post->status == 'available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="adopted" {{ $post->status == 'adopted' ? 'selected' : '' }}>Adopted
                                </option>
                            </select>
                            <button type="submit"
                                class="text-xs font-medium px-3 py-1 rounded-md bg-[#A67C52] text-white hover:bg-[#8C5E35] transition">
                                Update
                            </button>
                        </form>
                        <div class="flex gap-2 justify-center sm:justify-start">
                            <a href="{{ route('adopt.edit', $post->id) }}"
                                class="text-xs font-medium px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('adopt.destroy', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-xs font-medium px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition"
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500">No adoption posts found.</li>
            @endforelse
        </ul>

        <!-- Blog Posts Section -->
        <h2 class="text-xl sm:text-2xl font-semibold mt-8 mb-4 sm:mb-6 text-[#8C5E35]">Blog Posts</h2>
        <ul class="space-y-4">
            @forelse ($blogPosts as $post)
                <li
                    class="p-4 bg-gray-50 rounded-xl shadow-md border border-gray-200 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <!-- Gambar Thumbnail -->
                    <div class="flex-shrink-0">
                        <img src="{{ $post->blog_image ?? 'https://static.vecteezy.com/system/resources/previews/002/398/966/large_2x/cute-chubby-cat-kitten-cartoon-doodle-seamless-pattern-free-vector.jpg' }}"
                            alt="{{ $post->title }}"
                            class="w-24 h-24 sm:w-16 sm:h-16 object-cover rounded-lg mx-auto sm:mx-0">
                    </div>

                    <!-- Detail Post -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-[#A67C52] truncate">
                                {{ $post->title }}
                            </span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="w-full sm:w-auto flex justify-center sm:justify-start gap-2">
                        <a href="{{ route('user.posts.edit', $post->id) }}"
                            class="text-xs font-medium px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('user.posts.destroy', $post->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-xs font-medium px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500">No blog posts found.</li>
            @endforelse
        </ul>
    </div>
</x-layout>
