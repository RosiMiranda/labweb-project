@extends('layouts.main')

@section('content')
<div id="wrapper">
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header" style="z-index: -2;">
                <h1  class="logo">Mis ordenes activas</h1>
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
                                <div class="card-body">
                                    <h3 style="margin:0;">Id Orden: {{$order->id}}</h3>
                                    <h4 style="margin:0;"> Total: ${{$order->total}}mxn</h4>
                                    <button class="button ">Entregado</button>
                                    <a href="{{ route('order.show', ['order' => $order]) }}"><button class="button primary mt-2">Ver</button></a>
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
                                <div class="card-body">
                                    <h3 style="margin:0;">Id Orden: {{$order->id}}</h3>
                                    <h4 style="margin:0;"> Total: ${{$order->total}}mxn</h4>
                                    <a href="{{ route('order.show', ['order' => $order]) }}"><button class="button primary mt-2">Ver</button></a>
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
