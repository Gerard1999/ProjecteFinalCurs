@extends('layouts.app')

@section('content')

<div class="llista-productes">
    @foreach($products as $product)
        <h1>{{$product->name}}</h1>
    @endforeach
</div>

@endsection