<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // get user login
        $user = Auth::user();

        // return to view
        return view('member.profile.index', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        if($request->file('avatar')){
            // delete old avatar
            Storage::disk('local')->delete('public/avatars/'. basename($user->avatar));

            // upload new avatar
            $avatar = $request->file('avatar');
            $avatar->storeAs('public/avatars/', $avatar->hashName());

            // update profile with avatar
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $avatar->hashName(),
            ]);
        }else{
            // update profile without avatar
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // return back with toastr
        return back()->with('toast_success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request, User $user)
    {
        // validate request
        $request->validate([
            'password' => 'confirmed|required|min:6',
        ]);

        // check old password
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
            return back()->with('toast_error', 'Your current password does not matches with the password you provided.');
        }else{
            // update old password
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        // return back with toastr
        return back()->with('toast_success', 'Password changed successfully');
    }
}
