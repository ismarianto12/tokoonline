<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Cart
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
        $title = 'List Belanja';
        return view('depan.cart', compact('cartItems', 'title'));
    }

    public function barang_json()
    {
        $cartItems = Cart::getContent();
        return response()->json($cartItems);
    }

    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->nama_barang,
            'price' => $request->harga,
            'kategori' => $request->kategori,
            'quantity' => 1
        ]);
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
    }

    public function checkout(Request $request)
    {

        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {

            $data = new Pesanan;
            // $id_klien  = $request->id_klien;
            // $id_barang  = $request->id_barang;
            // $status  = $request->status;
            // $created_at  = $request->created_at;
            // $updated_at  = $request->updated_at;
            // $qty  = $request->qty;
            // $total  = $request->total;

            $id_klien = Auth::user()->id;
            $id_barang =  $item->id;
            $status = 1;
            $created_at = Carbon::now();
            $updated_at = Carbon::now();
            $qty = $item->quantity;
            $total = $item->total;
            $data->save();
        }
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->intended('cart');
    }
}
