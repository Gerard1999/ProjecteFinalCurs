@extends('layouts.app')

@section('content')
<div class="titol">
    <h1>Crear cursa</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="tornar">
            <a class="boto boto-petit" href="{{route('organizer.cursesorganitzador')}}">&larr;Tornar Enrere</a>
        </div>
        <div class="col-md-6">

            

            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="formulari" enctype="multipart/form-data" action="{{route('organizer.guardarcursa')}}" method="post">
                        @csrf
                    <span id="result"></span>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6">
                                    <label>Nom Cursa *</label>
                                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-6">
                                    <label>Població *</label>
                                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <label>Descripció *</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <br>
                            <div class="row">
                                <div class="col col-md-7">
                                    <label>Imatge de Portada *</label>
                                    <input type="file" name="img" class="@error('img') is-invalid @enderror">
                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-5">
                                    <label>Data *</label>
                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modalitats">
                                <input type="hidden" value="" id="counter" name="counter">
                                <h2>Modalitats:</h2>
                                <div class="modalitat">
                                    <div class="header-modalitat">
                                        <h4>Modalitat 1:</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-4 col-12">
                                            <label>Nom modalitat *</label>
                                            <input type="text" name="name_category_0" class="form-control @error('name_category_0') is-invalid @enderror">
                                            @error('name_category_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col col-md-4 col-6">
                                            <label>Quilòmetres *</label>
                                            <input type="number" name="kms_0" class="form-control @error('kms_0') is-invalid @enderror">
                                            @error('kms_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col col-md-4 col-6">  
                                            <label>Desnivell Positiu *</label>
                                            <input type="number" name="elevation_gain_0" class="form-control  @error('elevation_gain_0') is-invalid @enderror">
                                            @error('elevation_gain_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-3 col-6">
                                            <label>Lloc Inici *</label>
                                            <input type="text" name="location_start_0" class="form-control @error('location_start_0') is-invalid @enderror">
                                            @error('location_start_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                        
                                        </div>
                                        <div class="col col-md-3 col-6">
                                            <label>Lloc Fi *</label>
                                            <input type="text" name="location_finish_0" class="form-control @error('location_finish_0') is-invalid @enderror">
                                            @error('location_finish_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                         
                                        </div>
                                        <div class="col col-md-3 col-6">  
                                            <label>Hora Inici *</label>
                                            <input type="time" name="start_time_0" class="form-control  @error('start_time_0') is-invalid @enderror">
                                            @error('start_time_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                         
                                        </div>
                                        <div class="col col-md-3 col-6">
                                            <label>Preu *</label>
                                            <input type="number" name="price_0" class="form-control @error('price_0') is-invalid @enderror">
                                            @error('price_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <label>Num. avituallaments *</label>
                                            <input type="number" name="num_aid_station_0" class="form-control @error('num_aid_station_0') is-invalid @enderror">
                                            @error('num_aid_station_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                    </div>
                                        <div class="col col-md-6">  
                                            <label>Num. participants *</label>
                                            <input type="number" name="num_participants_0" class="form-control @error('num_participants_0') is-invalid @enderror">
                                        
                                            @error('num_participants_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <label>Imatge Perfil</label>
                                            <input type="file" name="elevation_img_0" class="@error('elevation_img_0') is-invalid @enderror">
                                            @error('elevation_img_0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="boto-afegir">
                                <button type="button" name="add" id="add" class="btn btn-success">Afegir Nova Modalitat</button>
                            </div>
                            <br><br>
                            <div class="row">
                                <input id="save" type="submit" value="Crear Cursa" class="boto boto-verd btn-block">
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
                    <div class="row">
                        <div class="col col-md-12">
                            <label>Imatge Perfil</label>
                            <input type="file" name="elevation_img_${counter}">
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
