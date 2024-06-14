<?php
namespace App\Http\Controllers;

use App\Services\ProfileUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileUpdate $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->profileService->updateUserProfile($request, Auth::id());

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully.');
    }
}
