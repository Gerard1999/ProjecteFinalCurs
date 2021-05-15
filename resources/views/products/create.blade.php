@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Crear un Producte</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{route('organizer.productes')}}">&larr;Tornar Enrere</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="formulari-producte" action="{{route('organizer.guardarproducte')}}" method="POST">
        @csrf
        <div class="imatge-producte">
            <h3>Imatge</h3>
        </div>
        <label for="image">Imatge Producte:</label>
        <input type="file" name="img">

        <label for="name">Nom Producte:</label>
        <input type="text" name="name" >

        <label for="description">Descripció:</label>
        <input type="text" name="description">

        <label for="price">Preu:</label>
        <input type="number" name="price">

        <input type="submit" name="enviar" value="Crear Producte" class="boto boto-petit boto-verd">
        

    </form>
</div>

@endsection