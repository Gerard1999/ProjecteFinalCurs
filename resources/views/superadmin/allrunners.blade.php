@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Tots els corredors</h1>
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
    @if(count($runners) == 0)
            <h3 class="titol marges">No hi ha cap corredor registrat...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <th>ID</th>
            <th>Nom</th>
            <th>Cognom</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>DNI</th>
            <th>Població</th>
            <th>Esborrar</th>
        </thead>
        <tbody class="cosTaula">
            @foreach($runners as $runner)
                <tr>
                    <td>{{$runner->id}}</td>
                    <td>{{$runner->name}}</td>
                    <td>{{$runner->runner->surname}}</td>
                    <td>{{$runner->email}}</td>
                    <td>{{$runner->telephone}}</td>
                    <td>{{$runner->nif}}</td>
                    <td>{{$runner->city}}</td>
                    <td>
                        <form action="{{ route('superadmin.eliminarusuari', $runner->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="boto boto-petit boto-vermell" onclick="return confirm('Estàs segur/a que vols eliminar el corredor: {{$runner->name}}?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection