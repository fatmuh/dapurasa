<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if ($request->type_of_payment == "Transfer" && $request->proof_of_payment == null) {
            return redirect()->back()->with('toast_error', 'Upload Bukti Transfer!');
        } elseif ($request->type_of_payment == "COD" && $request->proof_of_payment != null) {
            return redirect()->back()->with('toast_error', 'Tipe Pembayaran COD Tidak Menggunakan Bukti Transfer!');
        }

        $validatedData = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'type_of_payment' => 'required',
            'proof_of_payment' => 'image|file|max:2048',
            'delivery_address' => 'required',
            'delivery_time' => 'required',
        ]);

        if($request->file('proof_of_payment')) {
            $validatedData['proof_of_payment'] = $request->file('proof_of_payment')->store('image/proof_of_payment');
        }

        $user = auth()->user();

        $validatedData['users_id'] = $user->id;
        $validatedData['status'] = 'Pending';

        $order = Order::create($validatedData);

        if (!$order) {
            return redirect()->back()->with('toast_error', 'Periksa Form Pesanan Anda!');
        }

        return redirect()->route('landing.my-order')->with('toast_success', 'Pesanan Berhasil Dibuat!');
    }
}
