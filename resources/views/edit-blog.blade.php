@section('title', 'Edit Blog')
<x-layout>
    <div>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

        <div class="container mx-auto p-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-semibold text-[#D6A760]">🐈 Edit Blog About Cat 💖</h1>
                </div>
                <form action="{{ route('user.posts.update', $post->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Input -->
                    <div class="space-y-2">
                        <label for="title" class="block text-lg font-medium text-gray-700">Title:</label>
                        <input type="text"
                            class="w-full p-3 rounded-lg border border-[#D6A760] focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                            name="title" id="title" placeholder="Enter the title of your blog" value="{{ old('title', $post->title) }}">
                    </div>

                    <!-- Blog Image Upload -->
                    <div class="space-y-2">
                        <label for="blog_image" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Thumbnail Image:
                        </label>
                        <input
                            class="block w-full text-sm text-[#D6A760] border border-[#D6A760] rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#B58C4C] dark:text-gray-400 dark:bg-gray-800 dark:border-[#B58C4C] dark:placeholder-gray-400"
                            id="blog_image" name="blog_image" type="file" accept="image/*">
                        @error('blog_image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Quill.js Editor -->
                    <div class="space-y-2">
                        <label for="description" class="block text-lg font-medium text-gray-700">Content:</label>
                        <div id="editor" class="p-4 border-2 border-[#D6A760] rounded-lg" style="height: 300px;">
                            {!! old('description', $post->content) !!}
                        </div>
                        <textarea name="description" id="description" class="hidden">{{ old('description', $post->content) }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-[#D6A760] text-white font-semibold rounded-lg hover:bg-[#B58C4C] focus:outline-none focus:ring-2 focus:ring-[#B58C4C]">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: '',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    ['link'],
                    ['image']
                ]
            }
        });

        // Sync the Quill editor content with the hidden textarea
        $('form').submit(function() {
            var description = quill.root.innerHTML; // Get the HTML content
            $('#description').val(description); // Set the textarea value
        });
    </script>
</x-layout>
