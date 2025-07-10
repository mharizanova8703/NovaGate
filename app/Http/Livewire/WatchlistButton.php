<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class WatchlistButton extends Component
{
    public $tmdbId;
    public $isFavorited = false;

    public function mount($tmdbId)
    {
        $this->tmdbId = $tmdbId;
        $this->isFavorited = Auth::check() && Favorite::where('user_id', Auth::id())
            ->where('tmdb_id', $tmdbId)
            ->exists();
    }

    public function toggle()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($this->isFavorited) {
            Favorite::where('user_id', $user->id)
                ->where('tmdb_id', $this->tmdbId)
                ->delete();
            $this->isFavorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'tmdb_id' => $this->tmdbId,
            ]);
            $this->isFavorited = true;
        }
    }


    public function render()
    {
        return view('livewire.watchlist-button');
    }
}
