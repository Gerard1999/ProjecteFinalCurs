@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Historial de Compres</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{route('runner.privatezone')}}">&larr;Tornar Enrere</a>
    </div>
    
    @php($i = 1)
    @if(count($history) == 0)
            <h3 class="titol marges">No has realitzat cap cursa...</h3>
    @else
    <div id="accordion">
        @foreach($history as $invoice)
            <div class="card m-3">
                <div id="heading" class="center">
                    <h5>
                        <button class="boto boto-petit" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        Factura Nº {{$i}} - {{date('d/m/Y', strtotime($invoice->created_at))  }}  
                        </button>
                    </h5>
                </div>

                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i++}}" data-parent="#accordion">
                    <div class="card-body">
                    
                    <table class="taula">
                        <thead class="capcalera">
                            <th>Nº Factura {{$i-1}}</th>
                            <th>Producte</th>
                            <th>Preu </th>
                            <th>Unitats</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody class="cosTaula">
                    @foreach($invoice->cartDetails as $detail)
                        <tr>
                            <td><img src="{{$detail->product->get_image}}" height="60px" alt=""></td>
                            <td>
                                <a href="{{ route('product', $detail->product->id) }}" class="casellaRow">
                                    {{$detail->product->name}}
                                </a>
                            </td>
                            <td>{{$detail->product->price}}€</td>
                            
                            <td>{{$detail->quantity}}</td>
                            <td>{{$detail->sumPriceDetail()}}€</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total:</b></td>
                        <td><b>{{$invoice->priceCart()}}€</b></td>
                    </tr>
                </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @endforeach    
    </div>
    @endif
</div>


@endsection