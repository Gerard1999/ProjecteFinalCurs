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
    @foreach($history as $detail)
        <div class="card m-3">
            <div id="heading">
                <h5>
                    <button class="boto boto-petit" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                    Factura Nº {{$i}}  {{$detail->user->invoices}}  
                    </button>
                </h5>
            </div>

            <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i++}}" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    @endforeach    
    </div>


    <table class="taula">
        <thead class="capcalera">
            <th>Cursa</th>
            <th>Modalitat</th>
            <th>Lloc</th>
            <th>Km's</th>
            <th>Desnivell</th>
            <th>Data</th>
        </thead>
        <!--  -->
    </table>
    @else 
    <h3 class="titol marges">Encara no has realitzat cap compra...</h3>
    @endif
</div>


@include('footer')
@endsection