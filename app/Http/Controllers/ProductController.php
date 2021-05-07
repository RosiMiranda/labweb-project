<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('splendid.my-products',['products' => $products,'categories' => $categories]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('splendid.create-product', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check image
        if($request->hasFile('file')){
            $request->validate(['image' => 'mimes:jpeg,bmp,png']);
        }

        $user = Auth::user();
        $file = $request->file('image');
        $filename = $request->file->hashName();
        $request->file->move('uploads/products/', $filename);




        $arr = $request->input();
        $product = new Product();
        $product -> description = $arr['description'];
        $product -> user_id = $user -> id ;
        $product -> price = $arr['price'];
        $product -> size = $arr['size'];
        $product -> file_path = $filename;

        $product -> save();


        $category = Category::find($request->get('categories'));
        $product->categories()->attach($category);

        return redirect()->route('splendid.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('splendid.single-product',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Product $product)
    {
        return view('splendid.editProduct',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doEditProduct(Request $request, Product $product)
    {
        if($request->hasFile('file')){
            $request->validate(['image' => 'mimes:jpeg,bmp,png']);
            $file = $request->file('image');
            $filename = $request->file->hashName();
            $request->file->move('uploads/products/', $filename);
            $product -> file_path = $filename;
        }

        $user = Auth::user();


        $arr = $request->input();
        $product -> description = $arr['description'];
        $product -> user_id = $user -> id ;
        $product -> price = $arr['price'];
        $product -> size = $arr['size'];


        $product -> save();

        return redirect()->route('splendid.index');

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
