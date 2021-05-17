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
            <img src="{{$product->get_image}}" alt="">
        </div>
        <label for="image">Imatge Producte:</label>
        <input type="file" name="img" value="{{$product->get_image}}">
        <input type="number" name="size_id" value="{{$product->size_id}}" hidden>

        <label for="name">Nom Producte:</label>
        <input type="text" name="name" value="{{$product->name}}">

        <label for="description">Descripció:</label>
        <input type="text" name="description" value="{{$product->description}}">

        <label for="price">Preu:</label>
        <input type="number" name="price" value="{{$product->price}}">

        <div class="talles-disponibles">
            <h4>Talles Disponibles:</h4>
            <div class="opcions-talles">
                <div class="talla">
                    <label for="xs">XS</label>
                    <input type="checkbox" name="xs" @if(old('xs', $product->size->xs)) checked @endif)>
                </div>
                <div class="talla">
                    <label for="s">S</label>
                    <input type="checkbox" name="s" @if(old('s', $product->size->s)) checked @endif)>
                </div>
                <div class="talla">
                    <label for="m">M</label>
                    <input type="checkbox" name="m" @if(old('m', $product->size->m)) checked @endif)>
                </div>
                <div class="talla">
                    <label for="l">L</label>
                    <input type="checkbox" name="l" @if(old('l', $product->size->l)) checked @endif)>
                </div>
                <div class="talla">
                    <label for="xl">XL</label>
                    <input type="checkbox" name="xl" @if(old('xl', $product->size->xl)) checked @endif)>
                </div>
                <div class="talla">
                    <label for="xxl">XXL</label>
                    <input type="checkbox" name="xxl" @if(old('xxl', $product->size->xxl)) checked @endif)>
                </div>
            </div>
        </div>

        <input type="submit" name="enviar" value="Guardar Canvis" class="boto boto-petit boto-verd">
        

    </form>
</div>

@endsection