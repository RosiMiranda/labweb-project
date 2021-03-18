@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">Store</h1>
<div class="container arrows" style="width: 50%;">
    <h4 style="opacity:0%;">hola</h4>
</div>
<div class='container '>
        <x-filters></x-filters>
        <div class="row row-cols-3 row-cols-md-2 g-4" >
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
            <x-product-card description="Vestido" price=200.0></x-product-card>
        </div>
</div>
    
@endsection
