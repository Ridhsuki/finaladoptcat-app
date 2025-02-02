@section('title', 'Create Adopt')
<x-layout>
    <div class="container mx-auto p-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl font-semibold text-center text-[#D6A760] mb-6">🐾 Submit a Cat Adoption Request 🐾</h1>
            <form action="{{ route('adopt.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Name and Age -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name_cat" class="block text-lg font-medium">Cat Name:</label>
                        <input type="text" id="name_cat" name="name_cat"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                            placeholder="Cat's name" required>
                    </div>

                    <div>
                        <label for="age" class="block text-lg font-medium">Cat Age (months):</label>
                        <input type="number" id="age" name="age"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                            placeholder="Cat's age in months" required>
                    </div>
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-lg font-medium">Gender:</label>
                    <select id="gender" name="gender"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                        required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-lg font-medium">Location:</label>
                    <input type="text" id="location" name="location"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]"
                        placeholder="Example: Jonggol, Bogor, West Java." required>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-medium">Description:</label>
                    <textarea id="description" name="description"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B58C4C]" rows="5"
                        placeholder="Describe Your cat" required></textarea>
                </div>

                <!-- Cat Photo -->
                <div>
                    <label for="photo_url" class="block text-lg font-medium">Cat Photo:</label>
                    <input type="file" id="photo_url" name="photo_url"
                        class="block w-full text-sm text-[#D6A760] border border-[#D6A760] rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#B58C4C] dark:text-gray-400 dark:bg-gray-800 dark:border-[#B58C4C] dark:placeholder-gray-400"
                        accept="image/*" required>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-[#D6A760] text-white font-semibold rounded-lg hover:bg-[#B58C4C] focus:outline-none">
                    Submit Adoption Request
                </button>
            </form>
        </div>
    </div>
</x-layout>
