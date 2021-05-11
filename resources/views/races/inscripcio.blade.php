@extends('layouts.app')

@section('content')
<div class="pagina-cursa">
    <div class="header-imatge" style="height: 10rem;">
        @if($race->img_cover)
            <img src="{{ $race->get_image }}">
        @endif
        <div class="titular-cursa">
            <h2>{{$race->name}}</h2>
        </div>
    </div>
    <div class="titol">
        <h1>Inscripció a {{$race->name}}</h1>
    </div>

    <div class="formulari-inscripcio">
        <div class="benvinguda">
            <h3>Hola {{Auth::user()->name}} {{Auth::user()->runner->surname}},</h3>
            <h5>a quina modalitat de la cursa {{$race->name}} vols participar?</h5 >
        </div>
        <form action="{{route('runner.guardar-inscripcio')}}" method="POST">
            <input type="text" name="id" value="{{Auth::user()->id}}" hidden>

            <label for="category">Modalitat</label>
            <select  name="category">
                <option selected>-- Escull una modalitat --</option>
                @foreach($race->categories as $category)
                <option value="{{$category->id}}" selected>{{$category->name_category}} - {{$category->kms}}kms -</option>
                @endforeach
            </select>
            <input type="submit" class="boto" value="Inscriure'm">
        </form>
    </div>
</div>



@include('footer')
@endsection