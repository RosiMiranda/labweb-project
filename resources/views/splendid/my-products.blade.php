@extends('layouts.main')

@section('content')
<div id="wrapper">
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header" style="z-index: -2;">
                <h1  class="logo"><strong>Splendid </strong>Mis productos</h1>
            </header>
            <br>
            <!-- Section -->
            <div class="row row-cols-3 row-cols-md-2 g-4" >
                <!-- New Product "card" -->
                <div>
                    <div class="card card-store-new text-center text-white" >
                    <a href="{{ route('splendid.create')}}">
                        <span class="hyperspan" ></span>
                    </a>
                        <img src="{{ url('img/dress.png') }}" class="card-img-top" alt="...">
                        <div class="card-body align-center">
                            <h5 class="card-title">Nueva Prenda</h5>

                        </div>
                    </div>
                </div>
                @foreach ($products as $product)
                    <a href="{{ route('my_product.show', ['product' => $product]) }}">
                        <x-product-card description="{{$product->description}}"  price="{{$product->price}}" file="{{$product->file_path}}"/>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
