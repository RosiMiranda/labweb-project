@extends('layouts.main')

@section('content')
<div class="container mt-3 mb-3 align-center" style="min-height:80vh">
    <div class="row" style="border: 3px solid #2F6665;max-width: 600px;">
        <div class="col-12">
            <h1>Order ID: {{$order->id}}</h1>
            <div class="row">

            </div>
        </div>
        <div class="col-12 mt-5 mb-3" style="padding:0;">
            @foreach ($products as $product)
            <div class="card mt-1 product-order">
                <div class="row">
                    <div class="col-6">
                        <img src="../uploads/products/{{$product->file_path}}" class="" alt="..." style="width: 50%;">
                    </div>
                    <div class="col-6 align-center">
                        <h3 style="margin:0;">{{$product->description }} ${{$product->price }}</h3>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
        <div class="col-12 mt-3 mb-3" style="padding:0;">
            <h2>Total: ${{$order->total}}</h2>
        </div>
    </div>
</div>
@endsection
