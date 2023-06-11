<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurant = Restaurant::all()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $user = User::all()->count();
        return view('admin.pages.dashboard.index', [
            'restaurant' => $restaurant,
            'product' => $product,
            'order' => $order,
            'user' => $user,
        ]);
    }
}
