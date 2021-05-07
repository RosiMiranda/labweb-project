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
        return view('splendid.create-order');
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
        $user = Auth::user();
        $arr = $request->input();
        $products = $arr['products'];


        $sum = 0;
        $products_id =array();
        foreach($products as $p){
            $sum = $sum + $p->price;
            $products_id[]=$p->id;
        }

        $product_user = $products[0]->user_id;
        $order = new Order();
        $order -> shopingcarts_id = $arr['shopingcarts_id'];
        $order -> status = '1';
        $order -> total = $sum;
        $order -> buyer_id = $user;
        $order -> seller_id = $product_user;

        $order -> save();

        foreach($products as $p){
            Product::where('id',$p)->update(['order_id',$order->id]);
        }

        return redirect()->route('splendid.index');
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
        $user = Auth::user();
        $arr = $request->input();
        $products = $arr['products'];
        $product_user = $products[0]->user_id;
        $sum = 0;
        $products_id =array();
        foreach($products as $p){
            $sum = $sum + $p->price;
            $products_id[]=$p->id;
        }


        $order = Order::where('id',$id);
        $order -> shopingcarts_id = $arr['shopingcarts_id'];
        $order -> status = $arr['status'];
        $order -> total = $sum;
        $order -> buyer_id = $user;
        $order -> seller_id = $product_user;

        $order -> save();

        foreach($products as $p){
            Product::where('id',$p)->update(['order_id',$order->id]);
        }

        return redirect()->route('splendid.index');
    }

    /**
     * Cancel the specified resource from orders.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        //
        //
        $user = Auth::user();
        $arr = $request->input();
        $products = $arr['products'];
        $product_user = $products[0]->user_id;
        $sum = 0;
        $products_id =array();
        foreach($products as $p){
            $sum = $sum + $p->price;
            $products_id[]=$p->id;
        }


        $order = Order::where('id',$id);
        $order -> shopingcarts_id = $arr['shopingcarts_id'];
        $order -> status = '4';
        $order -> total = $sum;
        $order -> buyer_id = $user;
        $order -> seller_id = $product_user;

        $order -> save();

        foreach($products as $p){
            Product::where('id',$p)->update(['order_id',""]);
        }

        return redirect()->route('splendid.index');
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
}
