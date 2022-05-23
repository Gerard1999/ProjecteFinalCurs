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
                Ho organitza: 
                </em>
                @if($web = $race->organizer->link_web)
                <a target="blank" href="https://{{$web}}">{{$web}}</a>
                @else
                {{$race->organizer->user->name}}
                @endif
            </p>
            <div class="links-organizer">
                @if($insta = $race->organizer->link_instagram)
                    <a target="blank" href="https://{{$insta}}"><img src="{{asset('images/social_images/logotipo-de-instagram.png')}}" alt=""></a>
                @endif
                @if($fb = $race->organizer->link_facebook)
                    <a target="blank" href="https://{{$fb}}"><img src="{{asset('images/social_images/logotipo-circular-de-facebook.png')}}" alt=""></a>
                @endif
                @if($t = $race->organizer->link_twitter)
                    <a target="blank" href="https://{{$t}}"><img src="{{asset('images/social_images/gorjeo.png')}}" alt=""></a>
                @endif
            </div>
            
            @if($race->date > now()->toDateString())
            <br>
                @if (auth()->check())
                    <a class="boto" href="{{route('runner.inscripcio', $race)}}" style="margin-top:1.2rem;">Inscriu-t'hi!</a>
                @else
                    <a class="boto" href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn blue no-margin">
                        Inicia sessió per inscriure't
                    </a>
                @endif

                <!-- <a class="boto" href="{{route('runner.inscripcio', $race)}}" style="margin-top:1.2rem;">Inscriu-t'hi!</a> -->
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
                @if($category->elevation_img)
                    <div class="foto-desnivell">
                        <h4>PERFIL:</h4>
                        <img src="{{$category->get_image}}" alt="">
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        @if($race->date > now()->toDateString())
        <a class="boto" href="{{route('runner.inscripcio', $race)}}">Inscriu-t'hi!</a>
        @endif

        <div id="map" style="height: 500px; width: 800px; margin: auto;"></div>


        <!-- <div id='map' style='width: 800px; height: 400px; margin-top: 2rem; border-radius: 10px;'></div>
            <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiZ2VyYXJkMTk5OSIsImEiOiJja2I2cm1vbnUwMWhwMnVwYXNkdTJmM3U4In0.U_3ehdXAGsTDf_KqMSqHjw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11'
            });
            map.addControl(new mapboxgl.NavigationControl());
            </script>

    </div> -->
</div>
@include('footer')
@endsection

    <!-- Maps -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-gpx/1.7.0/gpx.min.js"></script>
    <script>

        window.onload = function () {
            var map = L.map('map');
            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
            attribution: 'Made by Gerard Lopez'
            }).addTo(map);
    
            var gpx = '../gpx/Surfing_in_da_night.gpx'; // URL to your GPX file or the GPX itself
            new L.GPX(gpx, {
                async: true,
                marker_options: {
                    startIconUrl: '',
                    endIconUrl: '',
                },
                polyline_options: {
                color: 'orange',
                opacity: 0.8,
                weight: 4,
                }
            }).on('loaded', function(e) {
            map.fitBounds(e.target.getBounds());
            }).addTo(map);
        }
    </script>