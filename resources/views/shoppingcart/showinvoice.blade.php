@extends('layouts.app')
@section('content')
<div class="titol">
    <h1>Rebut Compra</h1>
</div>



<div class="pagina-cursa">
        <table class="taula taula-petita">
            <thead class="capcalera">
                <th>Producte</th>
                <th>Preu</th>
                <th>Unitats</th>
                <th>Subtotal</th>
            </thead>
            <tbody class="cosTaula">
            @foreach($carro->cartDetails as $detail)
                    <tr>
                        <td>
                            <img src="{{$detail->product->get_image}}" height="100px" alt="">
                            <h5>{{$detail->product->name}} - Talla {{$detail->size}} -</h5>
                        </td>
                        <td>{{$detail->product->price}}€</td>
                        <td class="comptador-preu">{{$detail->quantity}}</td>
                        <td>{{$detail->sumPriceDetail()}}€</td>
                    </tr>
                @endforeach
                
                
            </tbody>
        </table>
        <div class="quadre-total">
            <h3>Total: {{$carro->priceCart()}}€</h3>
        </div>
</div>
@endsection
