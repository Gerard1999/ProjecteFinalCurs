@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel default-panel">
                <div class="panel-heading">
                    <h1 class="panel-title text-center p-2">{{ old('name', $race->name) }}</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('organizer.reguardarcursa', $race) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col col-md-6">
                                <label>Nom Cursa *</label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name', $race->name) }}">
                            </div>
                            <div class="col col-md-6">
                                <label>Població *</label>
                                <input type="text" name="location" class="form-control" required value="{{ old('location', $race->location) }}">
                            </div>
                        </div>
                            <br>
                            <label>Descripció *</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $race->description) }}</textarea>
                            <br>
                            <div class="row">
                                <div class="col col-md-7">
                                    <label>Imatge de Portada *</label>
                                    <input type="file" name="img" required value="{{ old('img_cover', $race->img_cover) }}">
                                </div>
                                <div class="col col-md-5">
                                    <label>Data *</label>
                                    <input type="date" name="date" class="form-control" required value="{{ old('date', $race->date) }}">
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualitzar Cursa" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
