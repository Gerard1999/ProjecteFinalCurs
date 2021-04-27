@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title text-center p-2">Crear una cursa</h1>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('organizer.races.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col col-md-6">
                                <label>Nom Cursa *</label>
                                <input type="text" name="name" class="form-control" required>
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
                            
                            
                            <!--<br><br>
                            <label>Es vendran samarretes? *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    SÍ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    NO
                                </label>
                            </div>-->
                            <br><br>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Crear Cursa" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
