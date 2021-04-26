@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-8 col-md-offset-6 box-login">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title text-center p-2">Registre Organitzador</h1>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('users.storeOrganizer') }}">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-5 col-12">
                                    <label for="name">Nom *</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-7 col-12">
                                    <label for="email">Correu Electrònic *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="row">

                                    <div class="col col-md-5 col-12">
                                        <label for="city">Població *</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" required autofocus>
        
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col col-md-7 col-12">
                                        <label for="address">Adreça</label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
        
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
                                    <label for="nif">NIF</label>
                                    <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" required autocomplete="nif">

                                    @error('nif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="col col-md-6 col-12">
                                    <label for="telephone">Telèfon</label>
                                    <input id="telephone" type="numer" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

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
                                <div class="col col-md-6 col-12">
                                    <label for="password">Contrasenya</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-md-6 col-12">
                                    <label for="password-confirm">Repeteix Contrsenya</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6 col-12">
                                    <label for="link_web">Link Pàgina Web</label>
                                    <input id="link_web" type="text" class="form-control @error('link_web') is-invalid @enderror" name="link_web" autocomplete="link_web">
                                </div>
                                <div class="col col-md-6 col-12">
                                    <label for="link_instagram">Link Instagram</label>
                                    <input id="link_instagram" type="text" class="form-control" name="link_instagram" autocomplete="link_instagram">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6 col-12">
                                    <label for="link_facebook">Link Facebook</label>
                                    <input id="link_facebook" type="text" class="form-control @error('link_facebook') is-invalid @enderror" name="link_facebook" autocomplete="link_facebook">
                                </div>
                                <div class="col col-md-6 col-12">
                                    <label for="link_twitter">Link Twitter</label>
                                    <input id="link_twitter" type="text" class="form-control" name="link_twitter" autocomplete="link_twitter">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrar-se</button>
                            <a class="btn btn-link btn-block" href="{{ route('login') }}">
                                Ja tinc un compte
                            </a>
                            <a class="btn btn-link btn-block" href="{{ route('register') }}">
                                Registrar Corredor
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
