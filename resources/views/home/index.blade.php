@extends('layouts.main')

@section('content')
    <h2 class="title">Splendid</h2>
        <div class="container arrows" style="width: 50%;">
            <h4 style="opacity:0%;">hola</h4>
        </div>
        <br>
    <div class="container dark-green">

        <p class="text-center">
            <br>
            Splendid es una plataforma, en donde las personas podran vender y comprar ropa de segunda mano, <br>
            dandole una segunda oportunidad. Con el fin de poder reciclar y encontrar ropa economica para toda ocasión.
            <br>
            <br>
        </p>
    </div>
    <br>


    <div id="carouselExampleCaptions" class="mx-auto carousel slide" data-ride="carousel" style="width: 50%;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('img/ropa1.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                    <h5>50% de descuento</h5>
                    <p>Solo del 22 al 30 de Abril</p>
            </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('img/ropa2.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>50% de descuento</h5>
                    <p>Solo del 22 al 30 de Abril</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




@endsection
