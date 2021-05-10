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
        <div class="dades-generals">
            <h2 class="card-text">Població: {{$race->location}}</h2>
            <b>{{ date('d/m/Y', strtotime($race->date)) }}</b>
            <p class="card-text">{{$race->description}}</p>
            <p class="text-muted mb-0">
                <em>
                Ho organitza:  {{ $race->organizer->user->name }}
                </em>
            </p>
        </div>
        <div class="modalitats">
            @foreach($race->categories as $category)
            <div class="modalitat">
                <div class="modalitat-titol">
                    <h3>{{$category->name_category}}</h3>
                </div>
                <div class="modalitat-info">
                    <p>{{$category->kms}}km</p>
                    <p>{{$category->elevation_gain}}m+</p>
                    <p>{{$category->price}}€</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
