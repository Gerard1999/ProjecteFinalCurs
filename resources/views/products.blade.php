@extends('layouts.app')

@section('content')
<div class="contingut">
    <h1>Productes</h1>
    <div class="productes">
        @foreach($products as $product)
        <div class="producte">
            <h4>{{$product->name}}</h4>
            <img src="{{$product->get_image}}" alt="" height="200px">
            <p>{{$product->description}}</p>
            <h4 class="price">{{$product->price}} €</h4>
        </div>
        @endforeach
    </div>
</div>
@endsection