@extends('layouts.app')

@section('content')

<div class="titol">
    <h1>galeria</h1>
</div>
<div class="pagina-cursa">
    <div class="imatges">
        @foreach($races as $race)
            <div class="imatge-galeria">
                <img src="{{ $race->get_image }}">
                <div class="enllac-cursa">
                    <a href="{{route('race',$race)}}">{{$race->name}}</a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $races->links() }}
</div>

@include('footer')
@endsection
