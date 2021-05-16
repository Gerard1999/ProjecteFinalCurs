@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Editar {{$product->name}}</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{route('organizer.productes')}}">&larr;Tornar Enrere</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
    </div>
    @endif

    <form class="formulari-producte" action="{{route('organizer.reguardarproducte')}}" method="POST">
        @csrf
        <div class="imatge-producte">
            <h3>Imatge</h3>
        </div>
        <label for="image">Imatge Producte:</label>
        <input type="file" name="img" value="{{$product->get_image}}">

        <label for="name">Nom Producte:</label>
        <input type="text" name="name" value="{{$product->name}}">

        <label for="description">Descripció:</label>
        <input type="text" name="description" value="{{$product->description}}">

        <label for="price">Preu:</label>
        <input type="number" name="price" value="{{$product->price}}">

        <input type="submit" name="enviar" value="Guardar Canvis" class="boto boto-petit boto-verd">
        

    </form>
</div>

@endsection