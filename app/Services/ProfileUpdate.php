<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate
{
    public function updateUserProfile(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $user = User::findOrFail($userId);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function markUserAsSeller(User $user)
    {
        $user->is_registered_seller = true;
        $user->save();
    }
}
