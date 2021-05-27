@extends('layouts.main')

@section('content')
<div class="container mt-3 mb-3 align-center" style="min-height:80vh">
    <div class="card" style="border: 1px solid #2F6665;max-width: 600px;">
        <div class="col-12">
            <h2>ID Orden: {{$order->id}}</h2>
            <div class="row">
                <div class="col-6">
                    <h3 style="margin:0;">Comprador</h3>
                    <p style="margin:0;">{{$buyer->name}}</p>
                    <p style="margin:0;">{{$buyer->address}}</p>
                </div>
                <div class="col-6">
                    <h3 style="margin:0;">Vendedor</h3>
                    <p style="margin:0;">{{$seller->name}}</p>
                    <p style="margin:0;">{{$seller->address}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5 mb-3" style="padding:0;">
            @foreach ($products as $product)
            <div class="card mt-1 product-order">
                <div class="row">
                    <div class="col-4">
                        <img src="../uploads/products/{{$product->file_path}}" class="" alt="..." style="width: 50%;">
                    </div>
                    <div class="col-4 align-center">
                        <h5 style="margin:0;">{{$product->description }}</h5>
                    </div>
                    <div class="col-4 align-center">
                        <h5 style="margin:0;"> ${{$product->price }}</h5>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
        <div class="col-12 mt-3 mb-3" style="padding:0;">
            <h3>Total: ${{$order->total}}</h3>
        </div>
    </div>
</div>
@endsection
