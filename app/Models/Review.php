<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tmdb_id',
        'content',
        'is_approved',
    ];

    // Review belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
