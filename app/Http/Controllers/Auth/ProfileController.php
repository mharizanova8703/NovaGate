<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $user = User::find(Auth::id());

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'] ?? null;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0755, true);
            }

            $file->move(public_path('profiles'), $filename);

            // ✅ Save relative path
            $user->profile_image = 'profiles/' . $filename;
        }

        $user->save(); // ✅ Works with Eloquent model

        return back()->with('success', 'Profile updated!');
    }
}
