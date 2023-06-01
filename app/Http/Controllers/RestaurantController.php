<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $data = Restaurant::all();
        return view('admin.pages.restaurant.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'image|file|max:2048',
            'image' => 'image|file|max:2048',
            'status' => 'required',
        ]);

        if($request->file('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('image/logo');
        }
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image/restaurant');
        }

        Restaurant::create($validatedData);
        return redirect()->route('restaurant.index')->with('toast_success', 'Restaurant Added Successfully!');
    }
}
