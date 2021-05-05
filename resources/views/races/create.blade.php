@extends('layouts.app')

@section('content')
<script src="{{ asset('js/formulari.js') }}" defer></script>
<div class="titol">
    <h1>Crear cursa</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="formulari" enctype="multipart/form-data">
                    <span id="result"></span>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6">
                                    <label>Nom Cursa *</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col col-md-6">
                                    <label>Població *</label>
                                    <input type="text" name="location" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <label>Descripció *</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                            <br>
                            <div class="row">
                                <div class="col col-md-7">
                                    <label>Imatge de Portada *</label>
                                    <input type="file" name="img" required>
                                </div>
                                <div class="col col-md-5">
                                    <label>Data *</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="modalitats">
                                <h2>Modalitats:</h2>
                                <div class="modalitat">
                                    <div class="header-modalitat">
                                        <h4>Modalitat 1:</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-4 col-12">
                                            <label>Nom modalitat *</label>
                                            <input type="text" name="name_category" class="form-control" required>
                                        </div>
                                        <div class="col col-md-4 col-6">
                                            <label>Quilòmetres *</label>
                                            <input type="number" name="kms" class="form-control" required>
                                        </div>
                                        <div class="col col-md-4 col-6">  
                                            <label>Desnivell Positiu *</label>
                                            <input type="number" name="elevation_gain" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-3 col-6">
                                            <label>Lloc Inici *</label>
                                            <input type="text" name="location_start" class="form-control" required>
                                        </div>
                                        <div class="col col-md-3 col-6">
                                            <label>Lloc Fi *</label>
                                            <input type="text" name="location_finish" class="form-control" required>
                                        </div>
                                        <div class="col col-md-3 col-6">  
                                            <label>Hora Inici *</label>
                                            <input type="time" name="start_time" class="form-control" required>
                                        </div>
                                        <div class="col col-md-3 col-6">
                                            <label>Preu *</label>
                                            <input type="number" name="price" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <label>Num. avituallaments *</label>
                                            <input type="number" name="num_aid_station" class="form-control" required>
                                        </div>
                                        <div class="col col-md-6">  
                                            <label>Num. participants *</label>
                                            <input type="number" name="num_participants" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="boto-afegir">
                                <button type="button" name="add" id="add" class="btn btn-success">Afegir Nova Modalitat</button>
                            </div>
                            <br><br>
                            <div class="row">
                                @csrf
                                <input id="save" type="submit" value="Crear Cursa" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
