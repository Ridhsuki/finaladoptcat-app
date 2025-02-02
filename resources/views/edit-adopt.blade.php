@section('title', 'Edit Adopt')
<x-layout>
    <div class="container mx-auto p-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl font-semibold text-center text-[#D6A760] mb-6">🐾 Edit Cat Adoption Information 🐾</h1>
            <form action="{{ route('adopt.update', $adoption->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name and Age -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Name -->
                    <div>
                        <label for="name_cat" class="block text-lg font-medium">Cat Name::</label>
                        <input type="text" id="name_cat" name="name_cat"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                            placeholder="Cat's Name" value="{{ old('name_cat', $adoption->cat->name_cat) }}" required>
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="block text-lg font-medium">Cat Age (months):</label>
                        <input type="number" id="age" name="age"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                            placeholder="Cat's age in months" value="{{ old('age', $adoption->cat->age) }}" required>
                    </div>
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-lg font-medium">Gender:</label>
                    <select id="gender" name="gender"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                        required>
                        <option value="male" {{ old('gender', $adoption->cat->gender) == 'male' ? 'selected' : '' }}>
                            Jantan</option>
                        <option value="female"
                            {{ old('gender', $adoption->cat->gender) == 'female' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-lg font-medium">Location:</label>
                    <input type="text" id="location" name="location"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                        placeholder="Example: Delanggu, Klaten, Central Java"
                        value="{{ old('location', $adoption->cat->location) }}" required>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-medium">Description:</label>
                    <textarea id="description" name="description"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]" rows="5"
                        placeholder="Describe your cat" required>{{ old('description', $adoption->cat->description) }}</textarea>
                </div>

                <!-- Photo -->
                <div>
                    <label for="photo_url" class="block text-lg font-medium mb-2">Change Cat
                        Photo:</label>

                    @if ($adoption->cat->photo_url)
                        <div class="relative mb-4">
                            <img src="{{ asset('storage/cat_photos/' . basename($adoption->cat->photo_url)) }}" alt="Current Photo"
                                class="w-32 h-32 object-cover rounded-lg shadow-lg mx-auto mb-2">
                            <span
                                class="absolute bottom-2 right-2 text-white bg-black bg-opacity-50 px-2 py-1 rounded-full text-xs">Current</span>
                        </div>
                    @endif

                    <input type="file" id="photo_url" name="photo_url"
                        class="block w-full text-sm text-[#D6A760] border border-[#D6A760] rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#B58C4C] dark:text-gray-400 dark:bg-gray-800 dark:border-[#B58C4C] dark:placeholder-gray-400" accept="image/*">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-[#D6A760] text-white font-semibold rounded-lg hover:bg-[#B58C4C] focus:outline-none">
                    Update Adoption Information
                </button>
            </form>
        </div>
    </div>
</x-layout>
