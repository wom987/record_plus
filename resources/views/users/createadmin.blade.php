@extends('layouts.app')
@section('content')
   @include('users.createform',['title'=>"Agregar Administrador",'user_type'=>'Admin','url'=>'/users/createadmin/'])
@endsection
