@extends('layouts.main')

@section('content')
<div id="wrapper">
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header" style="z-index: -2;">
                <h1  class="logo">My Active Orders</h1>
            </header>
            <!-- Section -->
            <div class="row row-cols-3 row-cols-md-2 g-4" >
                <div class="col-6">
                    <h3>Vendido</h3>
                    <div class="row row-cols-3 row-cols-md-2 g-4" >
                        <!-- card for order view -->
                        @foreach ($sell as $order)
                        <div class="col-6">
                            <div class="card card-orders text-center mt-2" style="width:100%">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="uploads/products/{{$order->file_path}}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 style="margin:0;">ID Orden: {{$order->id}} -- Total: {{$order->total}}</h5>
                                            <p class="card-text" style="margin:0;">{{$order->description}}</p>
                                            <div class="row">
                                                <button class="button ">Entregado</button>
                                                <button class="button primary mt-2">Ver</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-6">
                    <h3>Mis Compras</h3>
                    <div class="row row-cols-3 row-cols-md-2 g-4" >
                        <!-- card for order view -->
                        @foreach ($buy as $order)
                        <div class="col-6">
                            <div class="card card-orders-sell text-center mt-2" style="width:100%">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="uploads/products/{{$order->file_path}}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 style="margin:0;">ID Orden: {{$order->id}} -- Total: {{$order->total}}</h5>
                                            <p class="card-text" style="margin:0;">{{$order->description}}</p>
                                            <button class="button primary mt-2">Ver</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
