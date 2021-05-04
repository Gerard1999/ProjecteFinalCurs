@extends('layouts.app')

@section('content')
<div class="titol">
    <h1>Curses</h1>
</div>
<div class="curses" id="races">

    @foreach($races as $race)
    <div class="cursa">
        <div class="informacio-cursa">
            <h3>{{$race->name}}</h3>
            <h5>Població: {{$race->location}}</h5>
            <p class="descripcio">
                {{$race->get_excerpt}}
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
                    <h5>{{$category->name_category}} ({{$category->kms}}kms)</h5>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    {{$races->links()}}
</div>
@include('footer')
@endsection
