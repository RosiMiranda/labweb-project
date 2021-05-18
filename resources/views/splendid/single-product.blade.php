@extends('layouts.main')

@section('content')
<div class="container align-center mt-3" style="min-height:80vh;">

    <div class="row div-product ">
        <div class="col-12 col-sm-6 col-product-info">

            <h1>{{$product->description}}
                @if ($user->id == $product->user_id)
                    <a  href="{{ route('splendid.editProduct', ['product' => $product]) }}">
                        <img class="editProduct " src="{{ url('img/edit.png') }}" alt="..." >
                    </a>
                @endif
            </h1>
            <h2>${{$product->price}}</h2>
            <h3>Talla: {{$product->size}}</h3>
            <h2>Categorías:</h2>
            <div class="row">
            @foreach ($product->categories as $category)
                <li class="button category">{{$category->name }}</li>
            @endforeach
            </div>
            @if ($user->id == $product->user_id)
                <form action="{{route('product.destroy',['product' => $product]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="button primary mt-3" value="Borrar">
                    {{-- <button type="submit" class="button primary mt-3">Borrar</button>                --}}
                </form>
            @else
                <a href=" {{ url('add-to-cart/'.$product->id) }}"><button class="button primary mt-3">Agregar al carrito</button></a>
            @endif
        </div>
        <div class="col-12 col-sm-6  col-product-info">
            <img src="../uploads/products/{{$product->file_path}}" class="col-product-img" alt="...">
        </div>

    </div>
</div>
@endsection
