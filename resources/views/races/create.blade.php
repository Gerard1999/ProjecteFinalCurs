@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Cursa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('races.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nom Cursa *</label>
                            <input type="text" name="name" class="form-control" required>
                            
                            <label>Descripció *</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>

                            <label>Població *</label>
                            <input type="text" name="location" class="form-control" required>

                            <label>Data *</label>
                            <input type="date" name="date" class="form-control" required>

                            <label>Imatge de Portada *</label>
                            <input type="file" name="img" required>
                            
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
                            <br>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Crear Cursa" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
