@extends('layouts.app')

@section('content')


<div class="pagina-cursa">
    <div class="titol">
        <h1>Inscrits a la {{$race->name}}</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{ route('organizer.cursesorganitzador') }}">&larr;Tornar Enrere</a>
    </div>
    @if(count($llistaCursa) == 0)
            <h3 class="titol marges">Encara no hi ha ningú inscrit...</h3>
                
    @else
    <table class="taula">
        <thead class="capcalera">
            <th>Nom</th>
            <th>Cognoms</th>
            <th>DNI</th>
            <th>Modalitat</th>
            <th>Num. Dorsal</th>
        </thead>
        <tbody class="cosTaula">
            
            @foreach($llistaCursa as $inscripcio)
                <tr>
                    <td>{{$inscripcio->user->name}}</td>
                    <td>{{$inscripcio->user->runner->surname}}</td>
                    <td>{{$inscripcio->user->nif}}</td>
                    <td>{{$inscripcio->category->name_category}}</td>
                    <td>{{$inscripcio->num_dorsal}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection