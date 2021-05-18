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
                <select name="select">
                    <option name="xs" @if(!$product->size->xs) disabled @endif>XS</option>
                    <option name="s" @if(!$product->size->s) disabled @endif>S</option>
                    <option name="m" @if(!$product->size->m) disabled @endif>M</option>
                    <option name="l" @if(!$product->size->l) disabled @endif>L</option>
                    <option name="xl" @if(!$product->size->xl) disabled @endif>XL</option>
                    <option name="xxl" @if(!$product->size->xxl) disabled @endif>XXL</option>
                  </select>
            </ul>
        </div>
    </div>
</div>
@include('footer')
@endsection