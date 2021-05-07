@extends('layouts.main')

@section('content')
<div class="container mt-3 align-center" style="min-height:80vh;">
    <div class="row div-product ">
        <div class="col-12 col-sm-6 col-product-info">
            <h1>{{$product->description}}</h1>
            <h2>{{$product->description}}</h2>
            <h3>Talla: {{$product->size}}</h3>
            <h2>Categorias:</h2>
            <div class="row">
            @foreach ($product->categories as $category)
                <li class="button category">{{$category->name }}</li>
            @endforeach
            </div>
            @if ($user->id == $product->user_id)
                <button class="button primary mt-3">Editar</button>
                <form action="{{route('product.destroy',['product' => $product]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="button primary mt-3" value="Borrar">
                    {{-- <button type="submit" class="button primary mt-3">Borrar</button>                --}}
                </form>
            @else
                <button class="button primary mt-3">Agregar al carrito</button>
            @endif
        </div>
        <div class="col-12 col-sm-6  col-product-info">
            <img src="../uploads/products/{{$product->file_path}}" class="col-product-img" alt="...">
        </div>

    </div>
</div>
@endsection
