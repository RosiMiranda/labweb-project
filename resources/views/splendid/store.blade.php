@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">Store</h1>
<div class="container arrows" style="width: 50%;">
    <h4 style="opacity:0%;">hola</h4>
</div>
<div class='container '>
    <h3 class="title">Category</h3>
    <div class="row">
            @foreach ($categories as $category)
                    <x-category title="{{$category->name}}"></x-category>
            @endforeach
    </div>

    <div class="row col-12">
            <h4 style="width:100%; padding:1em;" class="text-center">Descripcion de categoria</h4>
    </div>
        <div class="row row-cols-3 row-cols-md-2 g-4" >
            @foreach ($products as $product)
                <a href="{{ route('product.show', ['product' => $product]) }}">
                    <x-product-card description="{{$product->description}}" price="{{$product->price}}" />
                </a>
            @endforeach
        </div>
</div>
    
@endsection
