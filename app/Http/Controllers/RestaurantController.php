<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id)
    {
        $item = Restaurant::findOrFail($id);
        $data = $request->except(['_token']);

        if($request->file('logo')) {
            if($request->oldLogo){
                Storage::delete($request->oldLogo);
            }
            $data['logo'] = $request->file('logo')->store('image/logo');
        }

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('image/restaurant');
        }

        $item->update($data);
        return redirect()->route('restaurant.index')->with('toast_success', 'Restaurant Edited Successfully!');
    }

    public function delete($id)
    {
        $item = Restaurant::findOrFail($id);
        if($item->logo){
            Storage::delete($item->logo);
        }
        if($item->image){
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect()->route('restaurant.index')->with('toast_success', 'Restaurant Deleted Successfully!');
    }
}
