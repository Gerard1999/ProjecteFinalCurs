@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Totes les curses</h1>
</div>
<div class="pagina-cursa">
    <div class="tornar">
        <a class="boto boto-petit esquerra" href="{{route('superadmin.superadminzone')}}">&larr;Tornar Enrere</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(count($races) == 0)
            <h3 class="titol marges">No hi ha curses a validar...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <tr>
                <th>Imatge</th>
                <th>Cursa</th>
                <th>Propietari</th>
                <th>Dia</th>
                <th>Lloc</th>
                <th>Veure Cursa</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="cosTaula">
            @forelse($races as $race)
                <tr>
                    <td><img src="{{$race->get_image}}" alt=""></td>
                    <td>{{$race->name}}</td>
                    <td>{{$race->organizer->user->name}}</td>
                    <td>{{date('d/m/Y', strtotime($race->date))}}</td>
                    <td>{{$race->location}}</td>
                    <td>
                        <a href="{{ route('race', $race)}}" class="boto boto-petit boto-blau">
                            Veure Cursa
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('superadmin.eliminarcursa', $race)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="boto boto-petit boto-vermell" onclick="return confirm('Estàs segur/a que vols eliminar aquesta cursa?')">
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
