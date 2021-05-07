@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mt-5 title">{{ auth()->user()-> name }} Profile</h1>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;"></h4>
    </div>
    <div>
            <a  href="{{ route('auth.edit')}}">
                <img class="edit" src="{{ url('img/edit.png') }}" class="" alt="...">
            </a>
    </div>
    <div  class="d-flex justify-content-center mt-3">
        <div class="d-flex justify-content-center">
            <img src="{{ url('img/user.png') }}" class="imageUser" alt="...">
        </div>
        @auth
        <div>
            
            <h3 class="font-weight-bold">Correo</h3>
            <p class="font-weight-bold">{{ auth()->user()-> email }}</p>

            <h3 class="font-weight-bold">Contraseña</h3>
            <p class="font-weight-bold">{{ auth()->user()-> password }}</p>

            <h3 class="font-weight-bold">Dirección</h3>
            <p class="font-weight-bold">{{ auth()->user()-> address }}</p>
            
        </div>
        @endauth
    </div>   
    
</div>

@endsection
