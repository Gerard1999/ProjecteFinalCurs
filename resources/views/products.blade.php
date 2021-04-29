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
            <div class="dades-producte">
                <h4>{{$product->name}}</h4> 
                    <!--<p>{{$product->description}}</p>-->
                <div class="separador"></div>
                <h5 class="preu">{{$product->price}} €</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection