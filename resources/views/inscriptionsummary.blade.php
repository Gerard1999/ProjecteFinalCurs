@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>Resum inscripció</h1>
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
    <h3 class="titular-resum-inscripcio">{{Auth::user()->name}}, t'has inscrit correctament a la cursa {{$inscripcio->race->name}}</h3>
    <div class="resum-inscripcio">
        <ul class="resum-esquerra">
            <li><b>Cursa:</b> {{$inscripcio->race->name}}</li>
            <li><b>Modalitat:</b> {{$inscripcio->category->name_category}}</li>
            <li><b>Quilòmetres:</b> {{$inscripcio->category->kms}}</li>
            <li><b>Desnivell:</b> {{$inscripcio->category->elevation_gain}}m+</li>
        </ul>
        <ul class="resum-dreta">
            <li><b>Num. Avituallaments:</b> {{$inscripcio->category->num_aid_station}}</li>
            <li><b>Lloc:</b> {{$inscripcio->category->location_start}}</li>
            <li><b>Preu:</b> {{$inscripcio->category->price}}€</li>
            <li><b>Num. Dorsal:</b> {{$inscripcio->num_dorsal}}</li>
        </ul>
    </div>
</div>
@include('footer')
@endsection