<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function getCart(Request $req){
        return view('splendid.shoppingcart');
    }
}
