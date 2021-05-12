@extends('layouts.app')

@section('content')

<div class="opcions">
    <ul class="links">
        <li><a href="{{route('runner.view-future-races')}}">Veure Futures Curses</a></li>
        <li><a href="">Veure Curses Realitzades</a></li>
    </ul>
</div>

@endsection