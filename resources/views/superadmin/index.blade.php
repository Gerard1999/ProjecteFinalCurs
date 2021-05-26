@extends('layouts.app')

@section('content')

<div class="private-zone">
    
    <h1 class="titol">SUPER ADMIN ZONE</h1>
    <div class="opcions">
        <ul class="links">
            <li><a href="{{route('superadmin.notvalidateraces')}}">Validar Noves Curses</a></li>
            <li><a href="{{route('superadmin.notvalidateproducts')}}">Validar Nous Productes</a></li>
            <li><a href="{{route('superadmin.allraces')}}">Veure totes les curses</a></li>
            <li><a href="{{route('superadmin.allproducts')}}">Veure tots els productes</a></li>
            <li><a href="{{route('superadmin.allrunners')}}">Veure Corredors</a></li>
            <li><a href="{{route('superadmin.allorganizers')}}">Veure Organitzadors</a></li>
        </ul>
    </div>
</div>

@endsection