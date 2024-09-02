<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Display the profile page
    public function show()
    {
        return view('admin.profile.index', [
            'title' => 'Profile',
        ]);
    }

    // Display the change password form
    public function changePassword()
    {
        return view('admin.profile.change-password', [
            'title' => 'Ubah Password',
        ]);
    }

    // Update the user's password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Check if the current password matches
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Password lama salah.');
        }

        // Update the password
        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.show')->with('success', 'Password berhasil diubah.');
    }
}
