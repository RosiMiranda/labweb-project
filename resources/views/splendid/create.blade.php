@extends('layouts.main')

@section('content')
<h1 class="mt-5 title">Nueva Prenda</h1>
<div class="card mt-5 light-green">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label  class="form-label">Categoria</label>
                <input type="text" class="form-control dark-green green-inputs" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Descripción</label>
                <input type="text" class="form-control dark-green green-inputs" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Precio</label>
                <input type="text" class="form-control dark-green green-inputs" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Talla</label>
                <input type="text" class="form-control dark-green green-inputs" >
            </div>

            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
</div>
@endsection
