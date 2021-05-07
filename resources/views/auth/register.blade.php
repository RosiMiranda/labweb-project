@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="title">Registro usuario</h2>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
    </div>
    <br>
    <div class=" container div-background-forms-login">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('auth.doRegister') }}" method="POST" class="mt-4">
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <label for="">Nombre:</label>
                            <input type="text"  name="name" class="green-inputs dark-green" >
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <label for="">Correo:</label>
                            <input type="email"  name="email" class="green-inputs dark-green" >
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <label for="">Dirección:</label>
                            <input type="text"  name="address" class="green-inputs dark-green">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <label for="fname">Contraseña:</label>
                            <input type="password"  name="password" class="green-inputs dark-green">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <label for="fname">Confirmar Contraseña:</label>
                            <input type="password"  name="password_confirmation" class="green-inputs dark-green">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <br>
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
