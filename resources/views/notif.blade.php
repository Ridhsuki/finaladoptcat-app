@section('title', 'Notifications')
<x-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-neutral-200">Notifications</h1>

        @forelse ($notifications as $notification)
            <div
                class="flex items-start gap-4 p-4 mb-4 border rounded-lg shadow-sm transition hover:shadow-lg {{ $notification->is_read ? 'bg-gray-50 dark:bg-neutral-800' : 'bg-white dark:bg-neutral-700' }}">
                <!-- Icon -->
                <div
                    class="flex items-center justify-center w-12 h-12 bg-[#D9C2A7] rounded-full shrink-0 dark:bg-[#A67C52]">
                    <svg class="w-6 h-6 text-[#8C5E35] dark:text-[#D9C2A7]" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8z" />
                    </svg>
                </div>
                <!-- Notification Content -->
                <div class="flex-1">
                    <p class="text-gray-800 dark:text-neutral-200">
                        {{ $notification->message }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1 dark:text-neutral-400">
                        {{ $notification->created_at->diffForHumans() }}
                    </p>

                    @if (!$notification->is_read)
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST"
                            class="mt-3">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-4 py-1 text-sm font-medium rounded-lg bg-[#A67C52] text-white hover:bg-[#8C5E35] focus:outline-none focus:ring-2 focus:ring-[#D9C2A7] focus:ring-offset-2 transition-colors duration-200">
                                Mark as Read
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <img src="https://media.tenor.com/Hkh0USs2v5EAAAAi/love-you-roar.gif" alt="No Notifications" class="mx-auto mb-4">
                <p class="text-gray-500 text-lg dark:text-neutral-400">You have no notifications yet.</p>
            </div>
        @endforelse
    </div>
</x-layout>
