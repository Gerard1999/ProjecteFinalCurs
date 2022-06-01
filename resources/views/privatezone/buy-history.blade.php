@extends('layouts.app')

@section('content')

<div class="pagina-cursa">
    <div class="titol">
        <h1>Historial de Compres</h1>
    </div>
    <div class="tornar">
        <a class="boto boto-petit" href="{{route('runner.privatezone')}}">&larr;Tornar Enrere</a>
    </div>
    
    @if($history)
    
    @php($i = 1)
    <div id="accordion">
    @foreach($history as $invoice)
        <div class="card m-3">
            <div id="heading">
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
                        <th>Nº Factura</th>
                        <th>Producte</th>
                        <th>Preu </th>
                        <th>Unitats</th>
                        <th>Subtotal</th>
                    </thead>
                    <!-- {{$invoice->user}} -->
                    {{$invoice->cart}}
                </table>
                </div>
            </div>
        </div>
    @endforeach    
    </div>
    @else 
    <h3 class="titol marges">Encara no has realitzat cap compra...</h3>
    @endif
</div>


@endsection