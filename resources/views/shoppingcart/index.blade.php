@extends('layouts.app')

@section('content')



<div class="titol">
    <h1>La meva cistella</h1>
</div>

<div class="pagina-cursa flexHoritzontal">
    @if(count($shopping_cart->cartDetails) >= 1)
        <table class="taula taula-petita">
            <thead class="capcalera">
                <th>Producte</th>
                <th>Preu</th>
                <th>Unitats</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </thead>
            <tbody class="cosTaula">
                @foreach($shopping_cart->cartDetails as $detail)
                    <tr>
                        <td>
                            <a href="{{ route('product', $detail->product->id) }}" class="casellaRow">
                                <img src="{{$detail->product->get_image}}" height="100px" alt="">
                                <h5>{{$detail->product->name}} - Talla {{$detail->size}} -</h5>
                            </a>
                        </td>
                        <td>{{$detail->product->price}}€</td>
                        <td class="comptador-preu">
                        <form action="{{ route('runner.updateCartDetail', $detail->id) }}" method="POST">
                            <input type="text" hidden value="sumar" name="accio">
                            <input type="submit" value="+" class="sumar boto boto-petit">
                            @csrf
                        </form>
                        <input id="qtt" type="number" min="1" value="{{$detail->quantity}}" disabled name="qtt">
                        <form action="{{ route('runner.updateCartDetail', $detail) }}" method="POST">
                            <input type="text" hidden value="restar" name="accio">
                            <input id="resta" type="submit" value="-" class="restar boto boto-petit">
                            @csrf
                        </form>
                        </td>
                        <td>{{$detail->sumPriceDetail()}}€</td>
                        <td>
                            <form action="{{ route('runner.deleteCartDetail', $detail) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="boto boto-petit boto-vermell">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <h3 class="titol marges">No tens cap producte a la cistella...</h3>
    @endif
    <div class="quadre-total">
        <h3>Total: {{$shopping_cart->priceCart()}}€</h3>
        <form action="{{ route('runner.restartSession', $shopping_cart) }}" method="POST">
            @csrf
            @method('POST')
            <input type="submit" value="Finalitzar Compra" class="boto boto-blau" @if($shopping_cart->cartDetails->isEmpty()) disabled @endif>
        </form>
        <!-- <form action="{{ route('runner.saveshopping', $shopping_cart) }}" method="POST">
            @csrf
            @method('POST')
            <input type="submit" value="Finalitzar Compra" class="boto boto-blau" @if($shopping_cart->cartDetails->isEmpty()) disabled @endif>
        </form> -->
    </div>
</div>
<script>
    if (document.querySelector("#qtt").value <= 1) {
        document.querySelector("#resta").disabled = true;
    }
</script>
@include('footer')
@endsection
