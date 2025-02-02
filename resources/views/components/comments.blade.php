@props(['comments', 'post'])
<div class="antialiased mx-auto max-w-screen-sm">
    <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>

    <div class="space-y-4">
        @if ($comments->isEmpty())
            <p class="text-gray-500 text-sm">No comments available.</p>
        @else
            @foreach ($comments as $comment)
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                            src="{{ $comment->user->profile_picture ? asset('storage/' . $comment->user->profile_picture) : 'https://harvesthosts-marketing-assets.s3.amazonaws.com/wp-content/uploads/2021/11/whoknows-1.jpg' }}" alt="pp">
                    </div>
                    <div
                        class="flex-1 flex flex-col justify-between border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <strong>{{ $comment->user->name }}</strong>
                                <span
                                    class="text-xs text-gray-400 ml-2">{{ $comment->created_at->format('d/m/Y') }}</span>
                            </div>
                            <button id="dropdownCommentButton-{{ $comment->id }}"
                                data-dropdown-toggle="dropdownComment-{{ $comment->id }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                        </div>

                        <!-- Konten Komentar -->
                        <p class="text-sm text-gray-800 mt-2">{{ $comment->content }}</p>

                        <!-- Dropdown Menu -->
                        <div id="dropdownComment-{{ $comment->id }}"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownCommentButton-{{ $comment->id }}">
                                <li>
                                    <button
                                        class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="hs-focus-management-modal-{{ $comment->id }}"
                                        data-hs-overlay="#hs-focus-management-modal-{{ $comment->id }}">Edit</button>
                                </li>
                                <li>
                                    <button
                                        class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="hs-scale-animation-modal-{{ $comment->id }}"
                                        data-hs-overlay="#hs-scale-animation-modal-{{ $comment->id }}">Delete</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <!-- Form Komentar Baru -->
        <div class="flex flex-col border-t mt-6 pt-4">
            <h4 class="mb-2 text-sm text-gray-600 font-semibold">Leave a Comment</h4>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="flex">
                    <!-- Foto Profil -->
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                            src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://harvesthosts-marketing-assets.s3.amazonaws.com/wp-content/uploads/2021/11/whoknows-1.jpg' }}" alt="pp">
                    </div>

                    <!-- Kolom Input untuk Komentar -->
                    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Write your comment..."
                            class="w-full border rounded-lg p-2 text-sm border-[#D6A760] focus:outline-none focus:ring-2 focus:ring-[#B58C4C] focus:border-[#D6A760]"
                            rows="3" required></textarea>

                        <button type="submit"
                            class="mt-3 rounded-lg border border-transparent px-3 py-1 sm:px-4 sm:py-2 bg-[#A67C52] text-white hover:bg-[#8C5E35] focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2 transition-colors duration-200">Post
                            Comment</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- Buat edit komentar -->
<!-- Modal -->
@foreach ($comments as $comment)
    <div id="hs-focus-management-modal-{{ $comment->id }}"
        class="hs-overlay hidden fixed top-0 left-0 z-[80] w-full h-full overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-focus-management-modal-label-{{ $comment->id }}">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
            <!-- Modal Content -->
            <div
                class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 w-full sm:max-w-lg">
                <!-- Header -->
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-focus-management-modal-label-{{ $comment->id }}"
                        class="font-bold text-gray-800 dark:text-white">
                        Edit Comment
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-focus-management-modal-{{ $comment->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-4 overflow-y-auto">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        @method('PATCH')
                        <label for="commentContent-{{ $comment->id }}"
                            class="block text-sm font-medium mb-2 dark:text-white">Edit your comment</label>
                        <textarea id="commentContent-{{ $comment->id }}" name="content"
                            class="py-3 px-4 block w-full rounded-lg text-sm border border-[#D6A760] focus:outline-none focus:ring-2 focus:border-[#D6A760] focus:ring-[#B58C4C]
                            dark:border-neutral-700 dark:placeholder-neutral-500 dark:text-neutral-400"
                            required autofocus>{{ $comment->content }}</textarea>

                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#hs-focus-management-modal-{{ $comment->id }}">
                                Cancel
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent
                                bg-[#A67C52] text-white hover:bg-[#8C5E35] focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2 transition-colors duration-900 focus:bg-[#A67C52]">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="hs-scale-animation-modal-{{ $comment->id }}"
        class="hs-overlay hidden fixed top-0 left-0 z-[80] w-full h-full overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label-{{ $comment->id }}">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
            <!-- Modal Content -->
            <div
                class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 w-full sm:max-w-lg">
                <!-- Header -->
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-scale-animation-modal-label-{{ $comment->id }}"
                        class="font-bold text-gray-800 dark:text-white">
                        Delete Comment
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-scale-animation-modal-{{ $comment->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-4 overflow-y-auto">
                    <p class="text-sm text-gray-800 dark:text-white">Are you sure you want to delete this comment?</p>
                    <p class="text-xs text-gray-500 dark:text-neutral-400">This action cannot be undone.</p>

                    <!-- Form for Deleting -->
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                        class="inline-block w-full mt-4">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#hs-scale-animation-modal-{{ $comment->id }}">
                                Cancel
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
