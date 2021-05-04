@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($race->img_cover)
                    <img src="{{ $race->get_image }}" class="card-img-top img-cover">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{$race->name}}</h3>
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
        </div>
    </div>
</div>
@endsection
