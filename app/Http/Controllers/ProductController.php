<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        $restaurant = Restaurant::all();
        return view('admin.pages.product.index', compact('data', 'restaurant'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image/product');
        }

        Product::create($validatedData);
        return redirect()->route('product.index')->with('toast_success', 'Product Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->except(['_token']);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('image/product');
        }

        $item->update($data);
        return redirect()->route('product.index')->with('toast_success', 'Product Edited Successfully!');
    }

    public function delete($id)
    {
        $item = Product::findOrFail($id);
        if($item->image){
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect()->route('product.index')->with('toast_success', 'Product Deleted Successfully!');
    }
}
