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
    <div class="resum-inscripcio">
        <ul>
            <li>Cursa: {{$inscripcio->race->name}}</li>
            <li>Modalitat: {{$inscripcio->category->name_category}}</li>
            <li>Quilòmetres: {{$inscripcio->category->kms}}</li>
            <li>Desnivell: {{$inscripcio->category->elevation_gain}}</li>
            <li>Lloc: {{$inscripcio->category->location_start}}</li>
            <li>Preu: {{$inscripcio->category->price}}</li>
            <li>Num. Dorsal: {{$inscripcio->num_dorsal}}</li>
        </ul>
    </div>
</div>
@include('footer')
@endsection