@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-10 col-md-offset-8 box-login">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title text-center p-2">Registre Corredor</h1>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('users.storeRunner') }}">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6">
                                    <label for="name">Nom *</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-6">
                                    <label for="surname">Cognom *</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                                <div class="col col-md-4 col-12">
                                    <label for="nif">DNI *</label>
                                    <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" autocomplete="nif">

                                    @error('nif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="col col-md-4 col-12">
                                    <label for="city">Població</label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-4 col-12">
                                    <label for="telephone">Telèfon *</label>
                                    <input id="telephone" type="numer" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" autocomplete="telephone" autofocus>

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6">
                                    <label for="email">Correu Electrònic *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-6">
                                    <label for="address">Adreça</label>
                                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6 col-12">
                                    <label for="password">Contrasenya *</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-6 col-12">
                                    <label for="password-confirm">Repeteix Contrsenya *</label>
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrar-se</button>
                            <a class="btn btn-link btn-block" href="{{ route('login') }}">
                                Ja tinc un compte
                            </a>
                            <a class="btn btn-link btn-block" href="organizers/register">
                                Registrar Organitzador
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
