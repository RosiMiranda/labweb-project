@extends('layouts.main')

@section('content')
<div class="container align-center mt-3" style="min-height:80vh;">
   
    <div class="row div-product ">
        <div class="col-12 col-sm-6 col-product-info">
           
            <h1>{{$product->description}}
                <a  href="url ">
                    <img class="editProduct " src="{{ url('img/edit.png') }}" alt="..." >
                </a>
            </h1>
            <h2>{{$product->description}}</h2>
            <h3>Talla: {{$product->size}}</h3>
            <h2>Categorias:</h2>
            <div class="row">
            @foreach ($product->categories as $category)
                <li class="button category">{{$category->name }}</li>
            @endforeach
            </div>
            <button class="button primary mt-3">Agregar al carrito</button>
        </div>
        <div class="col-12 col-sm-6  col-product-info">
            
            <img src="{{ url('img/ropa1.png') }}" alt="..." class="col-product-img">
        </div>

    </div>
</div>
@endsection
