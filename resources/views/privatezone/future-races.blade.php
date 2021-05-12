@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Llista de futures curses</h1>
    </div>
    
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
                @if($inscripcio->race->date > now()->toDateString())
                <tr>
                    <td>{{$inscripcio->race->name}}</td>
                    <td>{{$inscripcio->category->name_category}}</td>
                    <td>{{$inscripcio->race->location}}</td>
                    <td>{{$inscripcio->category->kms}}km's</td>
                    <td>{{$inscripcio->category->elevation_gain}}m+</td>
                    <td>{{date('d/m/Y', strtotime($inscripcio->race->date))}}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
</div>


@include('footer')
@endsection