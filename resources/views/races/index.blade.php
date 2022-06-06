@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Les meves curses</h1>
</div>
<div class="pagina-cursa">
    <div class="tornar">
        <a class="boto boto-petit esquerra" href="{{route('organizer.organizerzone')}}">&larr;Tornar Enrere</a>
        <a href="{{route('organizer.crearcursa')}}" class="boto boto-petit dreta">Crear una nova cursa</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(count($races) == 0)
            <h3 class="titol marges">No tens cap cursa...</h3>
    @else
    <table class="taula">
        <thead class="capcalera">
            <tr>
                <th>Cursa</th>
                <th>Dia</th>
                <th>Lloc</th>
                <th>Editar</th>
                <th>Veure Participants</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="cosTaula">
            @foreach($races as $race)
                <tr>
                    <td>{{$race->name}}</td>
                    <td>{{date('d/m/Y', strtotime($race->date))}}</td>
                    <td>{{$race->location}}</td>
                    <td>
                        <a href="{{ route('organizer.editarcursa', $race)}}" class="boto boto-petit boto-blau">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('organizer.veure-corredors', $race)}}" class="boto boto-petit boto-verd">
                            Veure Participants
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('organizer.eliminarcursa', $race)}}" method="POST">
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
