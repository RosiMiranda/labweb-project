@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title">Editar Perfil</h2>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
    </div>
    <br>
    <div class=" container div-background-forms-login">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('auth.doEdit') }}" method="POST" class="mt-4">
                @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre:</label>
                            <input value="{{ auth()->user()-> name }}" type="text"  name="name" class="green-inputs dark-green" >

                        </div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Correo:</label>
                            <input value="{{ auth()->user()-> email }}" type="email"  name="email" class="green-inputs dark-green" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Dirección:</label>
                            <input value="{{ auth()->user()-> address }}" type="text"  name="address" class="green-inputs dark-green">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="fname">Contraseña:</label>
                            <input value="{{ auth()->user()-> password }}" type="password"  name="password" class="green-inputs dark-green">
                        </div>
                    </div>
                        <div class="d-flex justify-content-center mt-3">
                            <input type="submit" value="Submit" class="btn btn:hover">
                        </div>
                    </div>
                </form>
            </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection
