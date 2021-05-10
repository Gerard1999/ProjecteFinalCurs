@extends('layouts.app')

@section('content')
<div class="pagina-cursa">
    <div class="header-imatge">
        @if($race->img_cover)
            <img src="{{ $race->get_image }}">
        @endif
        <div class="titular-cursa">
            <h2>{{$race->name}}</h2>
        </div>
    </div>
    
    <div class="info-cursa">
        <h5 class="card-text">Població: {{$race->location}}</h5>
        <p class="card-text">{{$race->description}}</p>
        <p class="text-muted mb-0">
            <em>
            Ho organitza:  {{ $race->organizer->user->name }}
            </em>
        </p>
        <h3>Modalitats:</h3>
        @foreach($race->categories as $category)
        <h5>{{$category->name_category}}</h5>

        @endforeach
        <em>{{ date('d/m/Y', strtotime($race->date)) }}</em>
    </div>
</div>
@endsection
