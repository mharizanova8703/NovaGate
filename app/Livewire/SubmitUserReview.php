<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class SubmitUserReview extends Component
{
    public $tmdbId;
    public $content;

    public function submit()
    {
        $this->validate([
            'content' => 'required|string|min:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'tmdb_id' => $this->tmdbId,
            'content' => $this->content,
            'is_approved' => false, // You can set to true if no moderation is needed
        ]);

        $this->reset('content');

        session()->flash('success', 'Thank you! Your review has been submitted and is under review.');
    }

    public function render()
    {
        return view('livewire.submit-user-review');
    }
}
