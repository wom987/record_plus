@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">Agregar Disco</h5>
                    </button>
                </div>

                <form method="post"
                    action="{{url('disks')}}"
                    enctype="multipart/form-data">
                    @method('POST')
                    <div class="form-group row">
                        @csrf
                        <label for="name"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                required
                                value="{{ old('name') }}"
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
                        <label for="album"
                            class="col-md-4 col-form-label text-md-right">{{ __('Álbum') }}</label>

                        <div class="col-md-6">
                            <input id="album"
                                type="text"
                                class="form-control @error('album') is-invalid @enderror"
                                name="album"                                    
                                value="{{ old('album') }}"
                                required >

                            @error('album')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="artist"
                            class="col-md-4 col-form-label text-md-right">{{ __('Artista') }}</label>

                        <div class="col-md-6">
                            <input type="text"
                                name="artist"
                                id="artist"
                                value="{{ old('artist') }}"
                                class="form-control @error('artist') is-invalid @enderror" />
                            @error('artist')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="genere"
                            class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                        <div class="col-md-6">
                            <input id="text"
                                type="genere"
                                class="form-control @error('genere') is-invalid @enderror"
                                name="genere"
                                required
                                autocomplete="genere">

                            @error('genere')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year"
                            class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                        <div class="col-md-6">
                            <input id="year"
                                type="number"
                                class="form-control"
                                name="year"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cover"
                            class="col-md-4 col-form-label text-md-right">{{ __('Foto de portada') }}</label>
                        <div class="col-md-6">
                            {{ Form::file('cover', ['class' => 'form-control', 'id' => 'cover', 'accept' => 'image/*']) }}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit"
                                class="btn btn-success">
                                {{ __('Guardar') }}
                            </button>
                            
                            <a class="btn"
                            href="{{ url('/disks') }}">
                            {{ __('regresar') }}
                            </a> 
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection