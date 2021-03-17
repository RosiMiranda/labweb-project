@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">My Products</h1>
<div class="btn">
    <a href="{{ route('splendid.create') }}" >Add new product</a>
</div>

@endsection
