@extends('layouts.main')

@section('content')

    @guest
    <div id="wrapper">
    <!-- Main -->
        <div id="main">
            <div class="inner">
                <!-- Header -->
                <header id="header">
                    <a href="index.html" class="logo"><strong>Lab-Web</strong></a>
                </header>

                <!-- Banner -->
                <section id="banner">
                    <div class="content">
                        <header>
                            <h1>Hola,<br/>
                            soy Splendid</h1>

                        </header>
                        <p> Splendid es una plataforma, en donde las personas podran vender y comprar ropa de segunda mano,
                        dandole una segunda oportunidad. Con el fin de poder reciclar y encontrar ropa economica para toda ocasión.</p>
                    </div>
                    <span class="image object">
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
                                <span class="sr-only">Antes</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Después</span>
                            </a>
                        </div>

                    </span>
                </section>
            </div>
        </div>
    </div>
    @endguest


    @auth
    <div class="container">
        <h1 class="mt-5 title">¿Que quieres checar hoy?</h1>
        <div class="container arrows" style="width: 50%;">
            <h4 style="opacity:0%;">hola</h4>
        </div>
        <br>
        <div class="container" style="height: 200px">
            <div class="row ">
                <div class="col-6 d-block w-100 text-center " >
                    <div class="home-imgs-one align-center">
                        <a class="button primary" href="{{ route('store.index')}}">Comprar</a>
                    </div>

                </div>
                <div class="col-6 d-block w-100 text-center home-imgs-two">
                    <div class="home-imgs-two align-center">
                        <a class="button primary" href="{{ route('splendid.index')}}">Vender</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endauth


@endsection
