@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Curses</h1>

            @foreach($races as $race)
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title">{{$race->name}}</h3>
                    <h5 class="card-text">Població: {{$race->location}}</h5>
                    <p class="card-text">
                        {{$race->get_excerpt}}
                        <a href="{{ route('race', $race) }}">Veure més</a>
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                        &ndash; {{ $race->organizer->name }}
                        </em>
                    </p>
                    <em>{{ $race->date }}</em>
                </div>
            </div>
            @endforeach
            
           
        </div>
    </div>
</div>
@endsection
