<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all();
        return view('landing.index', [
            'restaurant' => $restaurant,
        ]);
    }

    public function product($restaurant_id)
    {
        $product = Product::where('restaurant_id', $restaurant_id)->get();
        return view('landing.product', [
            'product' => $product,
        ]);
    }

    public function myOrder()
    {
        $users_id = auth()->user()->id;
        $data = Order::latest()
            ->where('users_id', $users_id)
            ->whereNotIn('status', ['Delivered', 'Cancelled'])
            ->get();

        return view('landing.myOrder', [
            'data' => $data,
        ]);
    }

    public function historyOrder()
    {
        $users_id = auth()->user()->id;
        $data = Order::latest()
            ->where('users_id', $users_id)
            ->whereIn('status', ['Delivered', 'Cancelled'])
            ->get();

        return view('landing.historyOrder', [
            'data' => $data,
        ]);
    }

    public function profil()
    {
        return view('landing.profil');
    }

    public function changePassword()
    {
        return view('landing.change-password');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $userData = $request->except(['_token']);
        $user->fill($userData);
        $user->save();
        return redirect()->route('landing.profil')->with('toast_success', 'Profil Berhasil Diubah!');
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

        return redirect()->route('landing.changePassword')->with('toast_success', 'Kata Sandi Berhasil Diubah!');
    }
}
