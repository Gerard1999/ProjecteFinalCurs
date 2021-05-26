@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Tots els organitzadors</h1>
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
    @if(count($organizers) == 0)
            <h3 class="titol marges">No hi ha cap organitzador registrat...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <th>ID</th>
            <th>Nom</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>NIF</th>
            <th>Població</th>
            <th>Web</th>
            <th>Esborrar</th>
        </thead>
        <tbody class="cosTaula">
            @foreach($organizers as $organizer)
                <tr>
                    <td>{{$organizer->id}}</td>
                    <td>{{$organizer->name}}</td>
                    <td>{{$organizer->email}}</td>
                    <td>{{$organizer->telephone}}</td>
                    <td>{{$organizer->nif}}</td>
                    <td>{{$organizer->city}}</td>
                    @if($web = $organizer->organizer->link_web)
                        <td><a target="blank" href="https://{{$web}}">{{$web}}</a></td>
                    @endif
                    <td>
                        <form action="{{ route('superadmin.eliminarusuari', $organizer->id)}}" method="POST">
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
@include('footer')
@endsection