<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile.index');
    }

    public function changePassword()
    {
        return view('admin.pages.profile.change-password');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $userData = $request->except(['_token']);
        $user->fill($userData);
        $user->save();
        return redirect()->route('profile.index')->with('toast_success', 'Profil Berhasil Diubah!');
    }

    public function changePasswordPost(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => ['required', 'current_password'],
            'password'     => ['required', 'confirmed']
        ]);

        $user = Auth::user();
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('profile.changePassword')->with('toast_success', 'Kata Sandi Berhasil Diubah!');
    }
}
