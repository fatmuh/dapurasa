<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

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
        $data = Order::latest()->where('users_id', $users_id)->get();
        return view('landing.myOrder', [
            'data' => $data,
        ]);
    }
}
