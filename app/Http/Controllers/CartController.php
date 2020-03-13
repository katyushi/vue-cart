<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CartCollection;
use App\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cart = new Cart([
        'title' => $request->get('title'),
        'price' => $request->get('price'),
        'qtd' => $request->get('qtd'),
        'stock' => $request->get('stock')
        ]);

        $cart->save();

        return response()->json('success');
    }

    public function index()
    {
        return new CartCollection(Cart::all());
    }
    
    public function delete($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return response()->json('successfully deleted');
    }
}
