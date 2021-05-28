@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="title">Nueva Prenda</h1>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
    </div>
    <div class="card mt-2 light-green">
        <div class="card-body">
            <form action="{{ route('splendid.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label style="margin-top:2rem;">Selecciona las categor(ías) del producto</label></br>
                            @foreach ($categories as $item)
                            <input type="checkbox" name="categories[]" value="{{ $item->id }}">
                            <label for="{{ $item->id }}" > {{ $item->name }}</label><br>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Descripción</label>
                            <input type="text" class=" green-inputs dark-green " name="description" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Precio</label>
                            <input type="text" class="dark-green green-inputs" name="price">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Talla</label>
                            <input type="text" class="dark-green green-inputs" name="size">
                        </div>
                        <input type="submit" value="Crear" class="button primary">
                    </div>
                    <div class="col-6">
                        <div class="button-wrapper">
                            <span class="label">
                                <span class="material-icons" style="font-size: 100px !important">
                                    photo_camera
                                </span>
                            </span>
                            <input type="file" id="upload" class="upload-box" name="file" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<div>
@endsection

