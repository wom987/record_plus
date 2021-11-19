
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">{{$title }}</h5>
                        </button>
                    </div>

                    <form method="post"
                        action="{{$url}}{{$user->id }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group row">
                            @csrf
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ $user->name }}"
                                    required
                                    autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ $user->email }}"
                                    required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_veric"
                                class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input type="text"
                                    name="phone"
                                    id="phone"
                                    value="{{ $user->phone }}"
                                    class="form-control @error('phone') is-invalid @enderror" />
                                @error('phone')
                                    <span class="invalid-feedback"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        @if ($user_type=="user")
                        <div class="form-group row">
                            <label for="music_preferences"
                                class="col-md-4 col-form-label text-md-right">{{ __('Preferencias musicales') }}</label>
                            <div class="col-md-6">
                                <input type="text"
                                    id="music_preferences"
                                    name="music_preferences"
                                    class="form-control"
                                    value="
                                    @if ($user->music_preferences == 0)
                                        Rock,Jazz,Electrónica,Reggae,Salsa,Dubstep,Cumbia,Rock and Roll,Gospel
                                    @else
                                        {{ $user->music_preferences }}
                                    @endif"
                                data-role="tagsinput" />
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_pic"
                                class="col-md-4 col-form-label text-md-right">{{ __('Foto de perfil') }}</label>
                            <div class="col-md-6">
                                {{ Form::file('profile_pic', ['class' => 'form-control', 'id' => 'profile_pic', 'accept' => 'image/*']) }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                    class="btn btn-warning">
                                    {{ __('Actualizar') }}
                                </button>
                                @if ($user_type=="user")
                                <a class="btn"
                                href="{{ url('/users/user') }}">
                                {{ __('regresar') }}
                            </a>
                                @else
                                <a class="btn"
                                href="{{ url('/users/admin') }}">
                                {{ __('regresar') }}
                            </a> 
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
