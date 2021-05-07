@extends('layouts.main')

@section('content')
<div id="wrapper">
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header" style="z-index: -2;">
                <h1  class="logo"><strong>Splendid</strong> Shopping Cart</h1>
            </header>
            <!-- Section -->
            <div class="row row-cols-3 row-cols-md-2 g-4 mt-2" >
                @foreach ($orders as $order)
                <div class="col-4 text-center">
                    <div class="card card-shoppnig text-center mt-2" style="width:100%">
                        <div class="card-body">
                            <h3 style="margin:0;">ID Orden: {{$order->id}} </h3>
                            <h3 style="margin:0;"> Total: {{$order->total}}</h3>
                            <button class="button mt-2">Cancelar</button>
                            <a href="{{ route('order.show', ['order' => $order]) }}"><button class="button primary mt-2">Ver</button></a>
                            <button class="button primary mt-2">Pagar</button>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
