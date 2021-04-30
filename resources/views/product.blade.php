@extends('layouts.app')

@section('content')
<div class="contingut-producte">
    <div class="imatge-producte">
        <img src="{{$product->get_image}}" alt="">
    </div>

    <div class="detalls-producte">
        <h1>{{$product->name}}</h1>
        <h3>Feta per {{$product->organizer->user->name}}</h3>
        <h3>{{$product->price}} €</h3>
        <h5>Talles disponibles:</h5>
    </div>
</div>

@endsection