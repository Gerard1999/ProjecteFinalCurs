@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Llista de curses realitzades</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{route('runner.privatezone')}}">&larr;Tornar Enrere</a>
    </div>
    {{$hihaCurses = false}} 
    @if(count($inscripcions) == 0)
            <h3 class="titol marges">No has realitzat cap cursa...</h3>
    
    @else
        @foreach($inscripcions as $inscripcio)
            @if($inscripcio->race->date < now()->toDateString())
                {{$hihaCurses = true}}
            @endif 
        @endforeach
    @endif    

    @if($hihaCurses)
    <table class="taula">
        <thead class="capcalera">
            <th>Cursa</th>
            <th>Modalitat</th>
            <th>Lloc</th>
            <th>Km's</th>
            <th>Desnivell</th>
            <th>Data</th>
        </thead>
        <tbody class="cosTaula">
            @foreach($inscripcions as $inscripcio)
                <tr>
                    <td><a href="{{ route('race', $inscripcio->race->id) }}">{{$inscripcio->race->name}}</a></td>
                    <td>{{$inscripcio->category->name_category}}</td>
                    <td>{{$inscripcio->race->location}}</td>
                    <td>{{$inscripcio->category->kms}}km's</td>
                    <td>{{$inscripcio->category->elevation_gain}}m+</td>
                    <td>{{date('d/m/Y', strtotime($inscripcio->race->date))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else 
    <h3 class="titol marges">No has realitzat cap cursa...</h3>
    @endif
</div>


@endsection