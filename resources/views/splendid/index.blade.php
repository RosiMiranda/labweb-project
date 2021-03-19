@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">My Products</h1>
<div class="container arrows" style="width: 50%;">
    <h4 style="opacity:0%;">hola</h4>
</div>
<div class='container '>
        <x-filters></x-filters>
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
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
        </div>
</div>

@endsection
