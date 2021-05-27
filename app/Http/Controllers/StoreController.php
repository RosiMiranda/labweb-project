<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('order_id', null)->get();
        $categories = Category::all();
        return view('splendid.store-products',['products' => $products,'categories' => $categories]);
    }

    /**
     * Display a listing of the resource based on selected category.
     *
     * @return \Illuminate\Http\Response
     */
    public function myFiltered(Category $filter)
    {
        $products = Product::where('order_id', null)->whereHas('categories', function($q) use($filter){
            $q->where('categories.id', $filter->id);
        })->get();
        $categories = Category::all();
        return view('splendid.my-products',['products' => $products,'categories' => $categories]);
    }

    public function showFiltered(Category $filter)
    {
        $products = Product::where('order_id', null)->whereHas('categories', function($q) use($filter){
            $q->where('categories.id', $filter->id);
        })->get();
        $categories = Category::all();
        return view('splendid.store-products',['products' => $products,'categories' => $categories]);
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
    public function show(Product $product)
    {
        $user = Auth::user();
        return view('splendid.single-product',['product' => $product, 'user' => $user]);
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
}
