@extends('layouts.main')

@section('content')
    <div class="divProductBackground">
        <div class="row">
            <div class="column">

                <h3>Descripcion: {{$product->description}}</h3>
                @foreach ($product->categories as $category)
                    <h3>Categoria: {{$category->name }} </h3>
                    <h3>{{$category->description  }}</h3>
                @endforeach
                <h3>Talla: {{$product->size}}</h3>
            </div>
            <div class="column">
                <img src="{{ url('img/jersey.png') }}" alt="...">
                <h1 style="margin-right: 2em;">${{$product->price}}</h1>
            </div>
        </div>
    </div>
@endsection