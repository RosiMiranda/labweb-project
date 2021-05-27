<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\ShoppingCart;
use App\Events\ProductoEvent;

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

    public function cancelOrder($id)
    {
        $user = Auth::user();

        $order = Order::where('id', '=', $id)->first();
        $order -> status = "4";

        $order ->save();

        //hacer for each product
        $products = Product::where('order_id', $id)->get();
        foreach($products as $p){
            $p ->order_id = null ;
            $p ->save();
            event(new ProductoEvent( $p));
        }

        return redirect()->route('user.cart');

    }

    public function deliveredOrder($id)
    {
        $user = Auth::user();

        $order = Order::where('id', '=', $id)->first();
        $order -> status = "3";

        $order ->save();

        return redirect()->route('order.index');

    }

    public function addToCart($request)
    {
        //traer el producto
        $product = Product::where('id', $request)->first();

        $user = Auth::user();

        // checar si hay carrito
        $shoppingcart = ShoppingCart::where('user_id', $user->id)->first();
        //si no crear uno
        if($shoppingcart == null){
            $shoppingcart = new ShoppingCart();
            $shoppingcart->user_id = $user->id;
            $shoppingcart -> save();
        }

        //checar si hay una orden con ese vendedor
        $order = Order::where('seller_id', $product->user_id)->where('buyer_id', $user->id)->where('status', 1)->first();

        //si no exite crear orden
        if($order == null){
            $order = new Order();
            $order -> shoppingcarts_id = $shoppingcart->id;
            $order -> seller_id = $product->user_id;
            $order -> buyer_id = $user->id;
            $order -> status = '1';
            $order -> total = $product->price;
        } else {
            $order -> total += $product->price;
        }


        $order ->save();

        //agregar el producto a la orden
        $product->order_id = $order->id;
        $product ->save();

        event(new ProductoEvent( $product));
        return redirect()->route('user.cart');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPayment($id)
    {
        $order = Order::where('id', '=', $id)->first();
        $products = Product::where('order_id', '=', $order->id)->get();
        $seller = User::where('id', $order->seller_id)->first();
        $buyer = User::where('id', $order->buyer_id)->first();

        $intent = auth()->user()->createSetupIntent();
        return view('splendid.payment',['order' => $order, 'products' => $products, 'seller' => $seller, 'buyer' => $buyer, 'intent' => $intent]);
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

    /**
     * Pay order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function purchase(Request $request, Order $order){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $order = Order::where('id', '=', $request->order )->first();
        $paymentMethod = $request->input('payment_method');


        $user = $request->user();
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);


        $seller = User::where('id', '=', $order->seller_id);

        $stripe->paymentMethods->attach(
            $paymentMethod,
            ['customer' => $user->stripe_id]
        );

        // destination has to be the same -> stripe just gave us one fake account
        //in production should be the account of the seller user
        try {
            $payment_intent = \Stripe\PaymentIntent::create([
            'payment_method_types' => ['card'],
            'amount' => $order->total * 100,
            'currency' => 'mxn',
            'application_fee_amount' => 120,
            'transfer_data' => [
                'destination' => 'acct_1IqoL72eWkNQ5tFW',
            ],
            'customer' =>  $user->stripe_id,
            'payment_method' => $paymentMethod,
            'confirm'=> true,
            ]);

            $order->status = 2;
            $order->save();
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('order.index');
    }
    public function sendOrders()
    {
        // $orders = Order::where('status', '=', '3')->where('seller_id', '=', $id);
        // return view('active-orders', ['sell' => $orders]);

        return view('splendid.pastOrders');
    }
}
