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
            <div class="row row-cols-3 row-cols-md-2 store" >
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
        console.log(e)
        // DELETE PRUDCTO DE VISTA
        //adding
        if(e.product.order_id == null){
            consoloe.log('agregar');
            $('.store').append
            ('<a href="{{ route("product.show", ["product" =>' + e.product.id + ']) }}>' +
                '<div class="col text-center" id="' + e.product.file_path + '"><div class="card card-store text-center text-white" style="width:18rem;">' +
                '<img src="uploads/products/' + e.product.file_path + '" class="card-img-top" alt="...">' +
                '<div class="card-body"><h5 class="card-title">'+ e.product.description +'</h5> <p class="card-text">$'+ e.product.price +'</p></div>' +
                '</div> </div>'
            '</a>');
        } else {
            //removing
            document.getElementById(e.product.file_path).remove();
        }
    })
</script>
@endsection
