<button
    wire:click="toggle"
    type="button"
    aria-pressed="{{ $isFavorited ? 'true' : 'false' }}"
    aria-label="{{ $isFavorited ? 'Remove from Watchlist' : 'Add to Watchlist' }}"
    title="{{ $isFavorited ? 'Remove from Watchlist' : 'Add to Watchlist' }}"
    class="watchlist-btn"
    placeholder="watch"
>
    {!! $isFavorited ? '★' : '☆' !!}
</button>
