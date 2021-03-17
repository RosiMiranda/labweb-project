@extends('layouts.main')

@section('content')
    <h2 class="title">Registro usuario</h2>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
    </div>
    <br>
    <div class=" container divbackgroundFormsLogin" style="width: 50%;">
        <div class="row justify-content-center">
            <form action="{{ route('auth.doRegister') }}" method="POST" class="mt-4">
            @csrf
                <label for="">Nombre:</label><br>
                <input type="text"  name="name" class="green-inputs dark-green" ><br>
                <label for="">Correo:</label><br>
                <input type="mail"  name="email" class="green-inputs dark-green" ><br>
                <label for="">Dirección:</label><br>
                <input type="text"  name="address" class="green-inputs dark-green"><br>
                <label for="fname">Contraseña:</label><br>
                <input type="password"  name="password" class="green-inputs dark-green"><br>
                <label for="fname">Confirmar Contraseña:</label><br>
                <input type="password"  name="password_confirmation" class="green-inputs dark-green"><br>
                <br>
                <div class="d-flex justify-content-center">
                            <input type="submit" value="Submit" class="btn btn:hover">
                </div>            
            </form>
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
@endsection