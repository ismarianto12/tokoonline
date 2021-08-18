<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Cart
use Cart;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function __construct()
    {
    }


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

        $session_id = Session::get('client_id');
        if (!empty($session_id)) {
            Cart::add([
                'id' => $request->id,
                'name' => $request->nama_barang,
                'price' => $request->harga,
                'kategori' => $request->kategori,
                'quantity' => 1
            ]);
        } else {
            return redirect()->intended(route('dashboarduser'));
        }
    }

    public function updateCart(Request $request)
    {
        // dd($request->all());
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Berhasil di update !');
        return redirect()->intended('cart');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
    }

    public function checkout(Request $request)
    {
        $cartItems = Cart::getContent();
        $session_id = Session::get('client_id');
        foreach ($cartItems as $item) {

            Pesanan::insert([
                'id_klien' => $session_id,
                'id_barang' => $item->id,
                'status' => 1,
                'qty' => $item->quantity,
                'total' => $item->quantity * $item->price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        session()->flash('success', 'All Item Cart Clear Successfully !');
        Cart::clear();
        return redirect()->intended('transaksi');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->intended('cart');
    }
}
