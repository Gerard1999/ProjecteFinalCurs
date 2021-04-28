@extends('layouts.app')

@section('content')
<div class="productes">
    <h1>Productes</h1>
    @foreach($products as $product)
    <div class="product">
        <h4>{{$product->name}}</h4>
        <img src="{{$product->get_image}}" alt="" height="200px">
    </div>
    @endforeach
</div>
@endsection