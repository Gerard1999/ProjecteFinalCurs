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
        <form action="{{route('runner.guardarinscripcio')}}" method="POST">
        @csrf
            @if(count($errors)> 0)
                <div class="alert alert-danger">
                    Selecciona una categoria
                </div>
            @elseif(session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
            <input type="text" name="race_id" value="{{$race->id}}" hidden>
            
            <select  name="category_id" class="@error('name') is-invalid @enderror">
                @foreach($race->categories as $category)
                <option value="{{$category->id}}" selected>{{$category->name_category}} - {{$category->kms}}kms -</option>
                @endforeach
                <option selected disabled>-- Escull una modalitat --</option>
            </select>
            <input type="submit" class="boto" value="Inscriure'm">
        </form>
    </div>
</div>



@endsection