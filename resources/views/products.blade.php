@extends('layouts.app')

@section('content')
<div class="titol">
    <h1>Els nostres productes</h1>
</div>
<div class="contingut">
    <div class="productes">
        @foreach($products as $product)
        <div class="producte">
            <div class="imatge-producte">
                <img src="{{$product->get_image}}">
            </div>
            <h4 class="dades-producte">{{$product->name}}</h4>
                <!--<p>{{$product->description}}</p>-->
            <hr>
            <h5 class="preu">{{$product->price}} €</h5>
            
        </div>
        @endforeach
    </div>
</div>
@endsection