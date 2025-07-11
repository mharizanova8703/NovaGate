<div class="mt-8">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="review-content" class="block text-sm font-medium text-gray-700">
                Your Review
            </label>
            <textarea
                id="review-content"
                wire:model.defer="content"
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                placeholder="Share your thoughts..."
            ></textarea>
            @error('content')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 transition">
                Submit Review
            </button>
        </div>
    </form>
</div>
