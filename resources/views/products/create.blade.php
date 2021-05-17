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
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
        </div>
    @endif

    <form class="formulari-producte" action="{{route('organizer.guardarproducte')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="imatge-producte">
            <h3>Imatge</h3>
        </div>
        <label for="img">Imatge Producte:</label>
        <input type="file" name="img">

        <label for="name">Nom Producte:</label>
        <input type="text" name="name" >

        <label for="description">Descripció:</label>
        <input type="text" name="description">

        <label for="price">Preu:</label>
        <input type="number" name="price">

        <div class="talles-disponibles">
            <h4>Talles Disponibles:</h4>
            <div class="opcions-talles">
                <div class="talla">
                    <label for="xs">XS</label>
                    <input type="checkbox" name="xs">
                </div>
                <div class="talla">
                    <label for="s">S</label>
                    <input type="checkbox" name="s">
                </div>
                <div class="talla">
                    <label for="m">M</label>
                    <input type="checkbox" name="m">
                </div>
                <div class="talla">
                    <label for="l">L</label>
                    <input type="checkbox" name="l">
                </div>
                <div class="talla">
                    <label for="xl">XL</label>
                    <input type="checkbox" name="xl">
                </div>
                <div class="talla">
                    <label for="xxl">XXL</label>
                    <input type="checkbox" name="xxl">
                </div>
            </div>
        </div>
        


        <input type="submit" name="enviar" value="Crear Producte" class="boto boto-petit boto-verd">
        

    </form>
</div>

@endsection