<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $sellorders = Order::where('seller_id', '=', $user->id)->where('status', '=', '2')->get();
        $buyorders = Order::where('buyer_id', '=', $user->id)->where('status', '=', '2')->get();
        return view('splendid.active-orders', ['sell' => $sellorders, 'buy' => $buyorders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = Product::where('order_id', '=', $order->id)->get();
        $seller = User::where('id', $order->seller_id)->first();
        $buyer = User::where('id', $order->buyer_id)->first();



        return view('splendid.show-order',['order' => $order, 'products' => $products, 'seller' => $seller, 'buyer' => $buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Get the orders from status = 2 'pagado' and sellerid = userid
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShoppingCartOrders($id)
    {
        $orders = Order::where('status', '=', '1')->where('seller_id', '=', $id);
        return view('active-orders', ['sell' => $orders]);
    }


    public function sendOrders()
    {
        // $orders = Order::where('status', '=', '3')->where('seller_id', '=', $id);
        // return view('active-orders', ['sell' => $orders]);

        return view('splendid.pastOrders');
    }

        
    
}
