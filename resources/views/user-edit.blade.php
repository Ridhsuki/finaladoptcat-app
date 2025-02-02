@section('title', 'Edit Your Profile')
<x-layout>
    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Profile & Settings</h1>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#D9C2A7] focus:border-[#D6A760] text-gray-900"
                    required>
            </div>

            <!-- Email (disabled) -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" disabled
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 text-gray-500">
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    placeholder="+62xxxxxxxxxx"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#D9C2A7] focus:border-[#D6A760]" required>
            </div>

            <!-- Bio -->
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio" rows="4"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#D9C2A7] focus:border-[#D6A760]">{{ old('bio', auth()->user()->bio) }}</textarea>
            </div>

            <!-- About -->
            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                <textarea name="about" id="about" rows="4"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#D9C2A7] focus:border-[#D6A760]">{{ old('about', auth()->user()->about) }}</textarea>
            </div>

            <!-- Profile Picture -->
            <div>
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <div class="mt-2 flex items-center space-x-4">
                    <img id="preview_img" class="h-16 w-16 rounded-full object-cover"
                        src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://harvesthosts-marketing-assets.s3.amazonaws.com/wp-content/uploads/2021/11/whoknows-1.jpg' }}"
                        alt="Current profile photo">
                    <input type="file" name="profile_picture" id="profile_picture"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 
                                  file:text-sm file:font-semibold file:bg-[#D9C2A7] file:text-white hover:file:bg-[#8C5E35]"
                        onchange="loadFile(event)">
                </div>
            </div>

            <!-- Save Button -->
            <button type="submit"
                class="inline-block w-full text-center bg-[#A67C52] text-white text-sm font-medium rounded-md px-4 py-2 hover:bg-[#8C5E35] focus:ring focus:ring-[#D9C2A7] transition-colors">
                Save Changes
            </button>
        </form>

        <!-- Additional Actions -->
        <div class="mt-6 flex justify-between flex-wrap gap-4">
            <!-- Delete Account Button -->
            <button data-hs-overlay="#delete-account-modal" aria-controls="hs-scale-animation-modal"
                data-hs-overlay="#hs-scale-animation-modal"
                class="py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700 focus:ring focus:ring-red-300 w-full sm:w-auto">
                Delete Account
            </button>

            <!-- Logout Button -->
            <button data-hs-overlay="#logout-modal"
                class="py-2 px-4 bg-gray-700 text-white rounded-md hover:bg-gray-800 focus:ring focus:ring-gray-400 w-full sm:w-auto">
                Logout
            </button>
        </div>
    </div>


</x-layout>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        };
    };
</script>
