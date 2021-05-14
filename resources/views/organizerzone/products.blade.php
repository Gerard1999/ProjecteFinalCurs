@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Els meus productes</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{ URL::previous() }}">&larr;Tornar Enrere</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(count($products) == 0)
            <h3 class="titol marges">No tens cap producte...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <th>Nom Producte</th>
            <th>Preu</th>
            <th>Imatge</th>
            <th>Editar</th>
            <th>Esborrar</th>
        </thead>
        <tbody class="cosTaula">
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('product', $product->id) }}">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{$product->get_image}}" alt=""></td>
                    <td><a href="" class="boto boto-petit boto-blau">Editar</a></td>
                    <td>
                        <form action="{{ route('organizer.eliminarproducte', $product->id)}}" method="POST">
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