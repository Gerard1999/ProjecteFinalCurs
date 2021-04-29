@extends('layouts.app')

@section('content')
<h1>Els nostres productes</h1>
<div class="contingut">
    <div class="productes">
        @foreach($products as $product)
        <div class="producte">
            <div class="imatge-producte">
                <img src="{{$product->get_image}}">
            </div>
            <div class="dades-producte">
                <h4>{{$product->name}}</h4>
                <p>{{$product->description}}</p>
                <hr>
                <h5 class="preu">{{$product->price}} €</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection