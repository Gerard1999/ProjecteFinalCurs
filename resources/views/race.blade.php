@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$race->name}}</h3>
                    <h5 class="card-text">Població: {{$race->location}}</h5>
                    <p class="card-text">{{$race->description}}</p>
                    <p class="text-muted mb-0">
                        <em>
                        Ho organitza:  {{ $race->organizer->name }}
                        </em>
                    </p>
                    <em>{{ $race->date }}</em>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
