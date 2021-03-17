@extends('layouts.main')

@section('content')
    <h1 class="title">Inicio sesión</h1>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
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
    <div class=" container divbackgroundFormsLogin" style="width: 50%;">
        <div class="row justify-content-center">
            <form action="{{ route('auth.do-login') }}" method="POST" class="mt-5 mb-5">
                @csrf
                <br>
                <br>
                <br>
                <label for="">Correo:</label><br>
                <input type="text" name="email" id="">
                <br>
                <label for="">Contraseña:</label><br>
                <input type="password" name="password" id="">
                <br>
                <br>
                <div class="d-flex justify-content-center">
                     <input type="submit" value="Inicio de sesión" class="btn btn:hover">
                </div>
                <br>  
                
            </form>
         </div>
     </div>
@endsection