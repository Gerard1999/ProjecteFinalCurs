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
            <div class="dades">
                <form action="{{route('shopping_cart_details.store')}}" method="post">
                    @csrf
                    <input type="number" value="{{$product->id}}" hidden name="product_id">
                    <select name="size">
                        <option name="xs" @if(!$product->size->xs) disabled @endif>XS</option>
                        <option name="s" @if(!$product->size->s) disabled @endif>S</option>
                        <option name="m" @if(!$product->size->m) disabled @endif>M</option>
                        <option name="l" @if(!$product->size->l) disabled @endif>L</option>
                        <option name="xl" @if(!$product->size->xl) disabled @endif>XL</option>
                        <option name="xxl" @if(!$product->size->xxl) disabled @endif>XXL</option>
                      </select>
                      <input type="number" name="quantity" value="1">
                      <input type="submit" value="Afegir al Carro" class="boto boto-petit boto-blau">
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection