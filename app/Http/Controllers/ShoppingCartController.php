<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function getCart(Request $req){
        $user = Auth::user();
        $orders = Order::where('buyer_id', '=', $user->id)->where('status', '=', '1')->get();
        return view('splendid.shoppingcart', ['orders' => $orders]);
    }
}
