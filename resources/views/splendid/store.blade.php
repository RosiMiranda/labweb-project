@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">Store</h1>
<div class="container arrows" style="width: 50%;">
    <h4 style="opacity:0%;">hola</h4>
</div>
<div class='container '>
        <x-filters></x-filters>
        <div class="row row-cols-3 row-cols-md-2 g-4" >
            @foreach ($products as $product)
                <x-product-card description="{{$product->description}}" price="{{$product->price}}" />
            @endforeach
        </div>
</div>
    
@endsection
