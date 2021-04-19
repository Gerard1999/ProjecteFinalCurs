@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Curses
                    <a href="{{route('races.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cursa</th>
                                <th>Dia</th>
                                <th>Lloc</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($races as $race)
                                <tr>
                                    <td>{{$race->name}}</td>
                                    <td>{{date('d/m/Y', strtotime($race->date))}}</td>
                                    <td>{{$race->location}}</td>
                                    <td>
                                        <a href="{{ route('races.edit', $race)}}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('races.destroy', $race)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur/a que vols eliminar aquesta cursa?')">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No hi ha curses</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
