<div class="mt-8">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="btn-red">
        <div>
            <label for="review-content" class="block text-sm font-medium text-gray-700">
          
            </label>
            <textarea
                id="review-content"
                wire:model.defer="content"
                rows="4"
                class="w-full border border-gray-300 w-75 px-3 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                placeholder="Share your thoughts..."
            ></textarea>
            @error('content')
                <p class="text-sm text-red mt-5">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-5">
            <button type="submit"
                class="search-btn  text-red px-4 py-2 transition">
                Submit Review
            </button>
        </div>
    </form>
</div>
