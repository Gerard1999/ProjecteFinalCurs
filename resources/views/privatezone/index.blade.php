@extends('layouts.app')

@section('content')

<div class="private-zone">
    
    <h1 class="titol">Benvingut/da, {{Auth::user()->name}}</h1>
    <div class="opcions">
        <ul class="links">
            <li><a href="{{route('runner.view-future-races')}}">Veure Futures Curses</a></li>
            <li><a href="{{route('runner.view-passed-races')}}">Veure Curses Realitzades</a></li>
            <li><a href="{{route('runner.view-buy-history')}}">Historial de Compres</a></li>
        </ul>
    </div>
</div>

@endsection