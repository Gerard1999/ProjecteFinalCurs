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
    <div class="tornar">
        <a class="boto boto-petit esquerra" href="{{ URL::previous() }}">&larr;Tornar Enrere</a>
    </div>
    <div class="info-cursa">
        <div class="dades-generals">
            <h2 class="card-text">Població: {{$race->location}}</h2>
            <p class="card-text">{{$race->description}}</p>
            <p class="text-muted mb-0">
                <em>
                Ho organitza:  {{ $race->organizer->user->name }}
                </em>
            </p>
            
            @if($race->date > now()->toDateString())
                <a class="boto" href="{{route('runner.inscripcio', $race)}}">Inscriu-t'hi!</a>
            @endif        </div>
        <div class="modalitats">
            @foreach($race->categories as $category)
            <div class="modalitat">
                    <div class="modalitat-titol">
                        <h3>{{$category->name_category}}</h3>
                    </div>
                    <ul class="modalitat-info">
                        <li><img src="{{asset('images/distance.png')}}">{{$category->kms}}km</li>
                        <li><img src="{{asset('images/mountains.png')}}">{{$category->elevation_gain}}m+</li>
                        <li><img src="{{asset('images/money.png')}}">{{$category->price}}€</li>
                    </ul>
                <div class="separador"></div>
                <div class="modalitat-detalls">
                    <ul>
                        <li><img src="{{asset('images/calendar.png')}}">{{ date('d/m/Y', strtotime($race->date)) }}</li>
                        <li><img src="{{asset('images/clock.png')}}">{{$category->start_time}}</li>
                        <li><img src="{{asset('images/xinxeta.png')}}">Sortida: {{$category->location_start}}</li>
                        <li><img src="{{asset('images/xinxeta.png')}}">Arribada: {{$category->location_finish}}</li>
                        <li><img src="{{asset('images/fork.png')}}">Avituallaments: {{$category->num_aid_station}}</li>
                        <li><img src="{{asset('images/group.png')}}">Màxim participants: {{$category->max_participants}}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        @if($race->date > now()->toDateString())
        <a class="boto" href="{{route('runner.inscripcio', $race)}}">Inscriu-t'hi!</a>
        @endif
        <div id='map' style='width: 800px; height: 400px; margin-top: 2rem; border-radius: 10px;'></div>
            <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiZ2VyYXJkMTk5OSIsImEiOiJja2I2cm1vbnUwMWhwMnVwYXNkdTJmM3U4In0.U_3ehdXAGsTDf_KqMSqHjw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11'
            });
            map.addControl(new mapboxgl.NavigationControl());
            </script>

    </div>
</div>
@include('footer')
@endsection
