<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class SubmitUserReview extends Component
{
    public int $tmdbId;
    public string $content = '';

    public function mount(int $tmdbId)
    {
        $this->tmdbId = $tmdbId;
    }

    public function submit()
    {
        $this->validate([
            'content' => 'required|min:5|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'tmdb_id' => $this->tmdbId,
            'content' => $this->content,
            'is_approved' => false,
        ]);

        $this->reset('content');
        session()->flash('success', 'Review submitted and pending approval.');
    }

    public function render()
    {
        return view('livewire.submit-user-review');
    }
}
