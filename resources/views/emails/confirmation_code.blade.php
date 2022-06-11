@extends('layouts.app')

@section('content')

    <h2>Hola {{ $name }}, gràcies per registrar-te a <strong>Trail Races</strong>!</h2>
    <p>Si us plau, verifica el teu correu electrònic.</p>
    <p>Per això, simplement fes clic en el següent enllaç:</p>

    <a href="{{ url('/register/verify/' . $confirmation_code) }}">
        Clica per confirmar el teu correu
    </a>

    
@endsection