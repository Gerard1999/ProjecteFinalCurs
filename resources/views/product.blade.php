@extends('layouts.app')

@section('content')
<div class="pagina-cursa">
    <div class="tornar">
        <a class="boto boto-petit esquerra" href="{{ URL::previous() }}">&larr;Tornar Enrere</a>
    </div>

    <div class="contingut-producte">
        <div class="imatge-producte">
            <img src="{{$product->get_image}}" alt="">
        </div>
        <div class="detalls-producte">
            <h2>{{$product->name}}</h2>
            <h3>{{$product->price}}€</h3>
            <h5>Talles disponibles:</h5>
            <ul class="talles">
                @if($product->size->xs)
                    <li>XS</li>
                @endif
                @if($product->size->s)
                    <li>S</li>
                @endif
                @if($product->size->m)
                    <li>M</li>
                @endif
                @if($product->size->l)
                    <li>L</li>
                @endif
                @if($product->size->xl)
                    <li>XL</li>
                @endif
                @if($product->size->xxl)
                    <li>XXL</li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection