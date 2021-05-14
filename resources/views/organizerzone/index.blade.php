@extends('layouts.app')

@section('content')

<div class="private-zone">
    <h1 class="titol">Benvingut/da, {{Auth::user()->name}}</h1>
    <div class="opcions">
        <ul class="links">
            <li><a href="{{ route('organizer.cursesorganitzador')}}">Les meves curses</a></li>
            <li><a href="{{ route('organizer.productes')}}">Els meus productes</a></li>
        </ul>
    </div>
</div>

@endsection