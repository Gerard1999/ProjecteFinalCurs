@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Productes per validar</h1>
</div>
<div class="pagina-cursa">
    <div class="tornar">
        <a class="boto boto-petit" href="{{ route('superadmin.superadminzone')}}">&larr;Tornar Enrere</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(count($products) == 0)
            <h3 class="titol marges">No hi ha productes a validar...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <th>Imatge</th>
            <th>Nom Producte</th>
            <th>Preu</th>
            <th>Validar</th>
            <th>Esborrar</th>
        </thead>
        <tbody class="cosTaula">
            @foreach($products as $product)
                <tr>
                    <td><img src="{{$product->get_image}}" alt=""></td>
                    <td><a href="{{ route('product', $product->id) }}">{{$product->name}}</a></td>
                    <td>{{$product->price}}€</td>
                    <td>
                        <form action="{{ route('superadmin.validarproducte', $product->id)}}" method="POST">
                            @csrf
                            <input type="submit" value="Validar" class="boto boto-petit boto-verd">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('superadmin.eliminarproducte', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="boto boto-petit boto-vermell" onclick="return confirm('Estàs segur/a que vols eliminar el producte: {{$product->name}}?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection