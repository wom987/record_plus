@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        Discos</h3>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <a href="{{ route('disks.create') }}"
                            class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> Agregar Disco
                        </a>
                        <div class="container mt-3">
                            <form action="{{ url('/disks/search') }}"
                                method="post">
                                @csrf
                                @method('POST')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"
                                            for="inputGroupSelect01">Filtro</label>
                                    </div>
                                    <select class="custom-select"
                                        id="filter"
                                        name="filter">
                                        <option selected
                                            value="name">Nombre</option>
                                        <option value="album">Album</option>
                                        <option value="artist">Artista</option>
                                    </select>
                                    &nbsp;
                                    &nbsp;
                                    <label for="label"
                                        class="col-form-label">Palabra clave:</label>
                                    &nbsp;
                                    <input type="text"
                                        class="input-form"
                                        id="key"
                                        name="key"
                                        placeholder="palabra clave">
                                    &nbsp;
                                    &nbsp;
                                    <input class=" btn-primary"
                                        type="submit"
                                        value="Buscar">&nbsp;
                                    &nbsp;
                                    <input class=" btn-secondary"
                                        onclick="window.location.href ='{{ route('disks.index') }}';"
                                        type="button"
                                        value="Limpiar">
                            </form>
                        </div>

                    </div>
                    <div class="card-group mt-3 center">
                       @if (count($disks)>0)
                       @foreach ($disks as $disk)
                       <div class="row mx-auto mt-2">
                           <div class="col-md-12"
                               id="sid{{ $disk->id }}">
                               <div class="card mb-12">
                                   <img src="{{ url("disk/diskPic/$disk->cover") }}"
                                       style="max-width:100%;width:auto;"
                                       height="200"
                                       class="card-img-top align-self-center">
                                   <div class="card-body">
                                       <h5 class="card-title"> <b>Nombre del disco:</b> {{ $disk->name }}</h5>
                                       <p class="card-text"><b>Álbum:</b>{{ $disk->album }}</p>
                                       <p class="card-text"><b>Artista:</b>{{ $disk->artist }}</p>
                                       <p class="card-text"><b>Género:</b>{{ $disk->genere }}</p>
                                       <p class="card-text"><b>Año:</b>{{ $disk->year }}</p>
                                       <p class="card-text"><small class="text-muted">
                                               <a class="btn btn-warning"
                                                   href="/disks/{{ $disk->id }}">
                                                   <i class="bi bi-pencil-fill"></i>
                                               </a>
                                               <a class="btn btn-danger me-2"
                                                   href="javascript:void(0)"
                                                   onclick="deleteDisk({{ $disk->id }})"><i class="bi bi-x-lg"></i>
                                               </a></small></p>
                                   </div>
                               </div>

                           </div>
                       </div>
                   @endforeach
                           
                       @else
                           <h1>No hay registros</h1>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
