@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="titol">
                <h1>{{ old('name', $race->name) }}</h1>
            </div>
            <div class="tornar">
                <a class="boto boto-petit" href="{{route('organizer.cursesorganitzador')}}">&larr;Tornar Enrere</a>
            </div>
            <div class="panel default-panel">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                        </div>
                    @endif

                    <form action="{{ route('organizer.reguardarcursa', $race) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                        <div class="row">
                            <div class="col col-md-6">
                                <label>Nom Cursa *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $race->name) }}">
                            </div>
                            <div class="col col-md-6">
                                <label>Població *</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $race->location) }}">
                            </div>
                        </div>
                            <br>
                            <label>Descripció *</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $race->description) }}</textarea>
                            <br>
                            <div class="row">
                                <div class="col col-md-7">
                                    <label>Imatge de Portada *</label>
                                    <input type="file" name="img" value="{{ old('img_cover', $race->img_cover) }}">
                                </div>
                                <div class="col col-md-5">
                                    <label>Data *</label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date', $race->date) }}">
                                </div>
                            </div>
                            <div class="modalitats">
                                <input type="hidden" value="" id="counter" name="counter">
                                <h2>Modalitats:</h2>
                                @foreach($race->categories as $categoria)
                            
                                    <div class="modalitat">
                                        <div class="header-modalitat">
                                            <h4>{{$categoria->name_category}}</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-4 col-12">
                                                <label>Nom modalitat *</label>
                                                <input type="text" name="name_category_0" class="form-control" value="{{ old('name_category', $categoria->name_category) }}">
                                            </div>
                                            <div class="col col-md-4 col-6">
                                                <label>Quilòmetres *</label>
                                                <input type="number" name="kms_0" class="form-control" value="{{ old('kms', $categoria->kms) }}">
                                            </div>
                                            <div class="col col-md-4 col-6">  
                                                <label>Desnivell Positiu *</label>
                                                <input type="number" name="elevation_gain_0" class="form-control" value="{{ old('elevation_gain', $categoria->elevation_gain) }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3 col-6">
                                                <label>Lloc Inici *</label>
                                                <input type="text" name="location_start_0" class="form-control" value="{{ old('location_start', $categoria->location_start) }}">
                                            </div>
                                            <div class="col col-md-3 col-6">
                                                <label>Lloc Fi *</label>
                                                <input type="text" name="location_finish_0" class="form-control" value="{{ old('location_finish', $categoria->location_finish) }}">
                                            </div>
                                            <div class="col col-md-3 col-6">  
                                                <label>Hora Inici *</label>
                                                <input type="time" name="start_time_0" class="form-control" value="{{ old('start_time', $categoria->start_time) }}">
                                            </div>
                                            <div class="col col-md-3 col-6">
                                                <label>Preu *</label>
                                                <input type="number" name="price_0" class="form-control" value="{{ old('price', $categoria->price) }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <label>Num. avituallaments *</label>
                                                <input type="number" name="num_aid_station_0" class="form-control" value="{{ old('num_aid_station', $categoria->num_aid_station) }}">
                                            </div>
                                            <div class="col col-md-6">  
                                                <label>Num. participants *</label>
                                                <input type="number" name="num_participants_0" class="form-control" value="{{ old('max_participants', $categoria->max_participants) }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="boto-afegir">
                                <button type="button" name="add" id="add" class="btn btn-success">Afegir Nova Modalitat</button>
                            </div>
                            <br><br>
                            <div class="row">
                                <input id="save" type="submit" value="Actualitzar Cursa" class="boto boto-verd btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jQuery341.js') }}" ></script>
<script defer>
    //Script per afegir/esborrar els camps per crear modalitat de curses
    $(document).ready(function() {
        var counter = 0;
        $('#counter').val(counter);

        function categoriesInputs(counter) {
            var html =
                `<div class="modalitat">
                    <div class="header-modalitat">
                        <h4>Modalitat:</h4>
                        <button type="button" class="btn btn-danger eliminar far fa-times-circle"></button>
                    </div>
                    <div class="row">
                        <div class="col col-md-4 col-12">
                            <label>Nom modalitat *</label>
                            <input type="text" name="name_category_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-4 col-6">
                            <label>Quilòmetres *</label>
                            <input type="number" name="kms_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-4 col-6">  
                            <label>Desnivell Positiu *</label>
                            <input type="number" name="elevation_gain_${counter}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3 col-6">
                            <label>Lloc Inici *</label>
                            <input type="text" name="location_start_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-3 col-6">
                            <label>Lloc Fi *</label>
                            <input type="text" name="location_finish_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-3 col-6">  
                            <label>Hora Inici *</label>
                            <input type="time" name="start_time_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-3 col-6">
                            <label>Preu *</label>
                            <input type="number" name="price_${counter}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <label>Num. avituallaments *</label>
                            <input type="number" name="num_aid_station_${counter}" class="form-control">
                        </div>
                        <div class="col col-md-6">  
                            <label>Num. participants *</label>
                            <input type="number" name="num_participants_${counter}" class="form-control">
                        </div>
                    </div>
                </div>`;
            $('.modalitats').append(html);

        }

        var add = document.querySelector('#add');
        add.addEventListener('click', () => {
            counter++;
            $('#counter').val(counter);
            categoriesInputs(counter);
            console.log( $('#counter').val());
        });


        $(document).on('click', '.eliminar', function() {
            $(this).parent().parent().remove();
            counter--;
            $('#counter').val(counter);
        });
    });
</script>
@endsection