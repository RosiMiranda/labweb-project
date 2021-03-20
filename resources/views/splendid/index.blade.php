@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">My Products</h1>
<div class="container arrows" style="width: 50%;">
    <h4 style="opacity:0%;">hola</h4>
</div>
<div class='container '>
        <h3 class="title">Category</h3>
        <div class="row">
                @foreach ($categories as $category)
                        <x-category title="{{$category->name}}"></x-category>
                @endforeach
        </div>
        <div class="row row-cols-3 row-cols-md-2 g-4" >
            <!-- New Product "card" -->
            <div class="col text-center">
                <div class="card card-store-new text-center text-white" style="width: 18rem;">
                <a href="{{ route('splendid.create')}}"> 
                    <span class="hyperspan" ></span>
                </a> 
                    <img src="{{ url('img/dress.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nueva Prenda</h5>
                        
                    </div>
                </div>
            </div>
            <!-- User Product to sell cards" -->
            @foreach ($products as $product)
                <a href="{{ route('my_product.show', ['product' => $product]) }}">
                    <x-product-card description="{{$product->description}}" price="{{$product->price}}" />
                </a>
            @endforeach
        </div>
</div>

@endsection
