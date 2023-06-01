<?php

namespace App\Http\Controllers;

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
}
