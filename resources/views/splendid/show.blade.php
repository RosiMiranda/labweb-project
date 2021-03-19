@extends('layouts.main')

@section('content')
    <div class="divProductBackground">
        <div class="row">
            <div class="column">
                <h3>Descripcion prenda</h3>
                <h3>categoria</h3>
                <h3>description categoria</h3>
                <h3>Talla</h3>
            </div>
            <div class="column">
                <img src="{{ url('img/jersey.png') }}" alt="...">
                <h1 style="margin-right: 2em;">precio</h1>
            </div>
        </div>
    </div>
@endsection