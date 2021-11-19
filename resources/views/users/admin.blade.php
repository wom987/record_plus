@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        Administradores</h3>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <a href="{{ url('/users/createadmin') }}"
                            class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> Agregar Administrador
                        </a>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="Table"
                                        class="table table-striped table-bordered"
                                        cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre completo</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th>Foto Perfil</th>
                                                <th colspan="2">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr id="sid{{ $user->id }}">
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td><img src="{{ url("users/profilePic/$user->profile_picture") }}"
                                                            width="50"
                                                            height="50">
                                                    </td>
                                                   
                                                    <td>
                                                        <a type="button"
                                                            class="btn btn-warning"
                                                            href="/users/admin/{{$user->id}}">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if (auth()->user()->id != $user->id)
                                                            <a class="btn btn-danger me-2"
                                                                href="javascript:void(0)"
                                                                onclick="deleteUser({{ $user->id }})"><i class="bi bi-x-lg"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
