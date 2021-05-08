@extends('layouts.main')

@section('content')
<div id="wrapper">
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header" style="z-index: -2;">
                <h1  class="logo"><strong>Splendid</strong> Store</h1>
                <ul class="icons">
                    @foreach ($categories as $category)
                        <x-category title="{{$category->name}}"></x-category>
                    @endforeach
                </ul>
            </header>
            <div class="row col-12" style="z-index: -2;">
                <h4 style="width:100%; padding:1em;" class="text-center">Descripcion de categoria</h4>
            </div>
            <!-- Section -->
            <div class="row row-cols-3 row-cols-md-2 g-4" >
                @foreach ($products as $product)
                    <a href="{{ route('product.show', ['product' => $product]) }}">
                        <x-product-card description="{{$product->description}}"  price="{{$product->price}}" file="{{$product->file_path}}"/>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    Echo.channel('producto').listen('ProductoEvent', (e) => {
        // DELETE PRUDCTO DE VISTA
        document.getElementById(e.product.file_path).remove();


    })
</script>
@endsection
