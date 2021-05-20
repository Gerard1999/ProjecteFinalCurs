@extends('layouts.app')

@section('content')
<div class="titol">
    <h1>Curses</h1>
</div>
<div class="formulari-filtratge">
    <h3>Busca una cursa</h3>
    <form action="{{route('races')}}" method="GET">
        @csrf
        <input type="text" name="nomCursa" placeholder="Nom Cursa" value="{{ old('nomCursa') }}">
        <input type="text" name="poblacio" placeholder="Població">
        <input type="number" name="kmsmin" placeholder="Min. kms">
        <input type="number" name="kmsmax" placeholder="Max. kms">
        <input type="number" name="metresmin" placeholder="Min. desnivell">
        <input type="number" name="metresmax" placeholder="Max. desnivell">
        <input type="submit" value="Buscar" class="boto boto-blau">
    </form>
</div>
<div class="curses" id="races">
    @if(count($races) <= 0)
        <div class="curses-buides">
            <h2>No hi ha curses amb aquests filtres...</h2>
        </div>
    @endif
    @foreach($races as $race)
    <div class="cursa">
        <div class="informacio-cursa">
            <h3>{{$race->name}}</h3>
            <h5>Població: {{$race->location}}</h5>
            <p class="descripcio">
                {{$race->get_excerpt}}...
            </p>
            <a class="link-cursa" href="{{ route('race', $race) }}">Veure més</a>
            <p class="nom-organitzador">
                <em>
                &ndash; Organitzat per <b>{{ $race->organizer->user->name }}</b> &ndash;
                </em>
            </p>
            <em>{{ date('d/m/Y', strtotime($race->date)) }}</em>
        </div>
        <div class="imatge-cursa">
            <img src="{{ $race->get_image }}">
            <div class="modalitats">
                @foreach($race->categories as $category)
                    <h5>{{$category->name_category}} ({{$category->kms}}kms - {{$category->elevation_gain}}m+)</h5>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    {{$races->links()}}
</div>
@include('footer')
@endsection
