@extends('layouts.app')
@section('content')
   @include('users.form',['title'=>"Editar Administrador",'user_type'=>'Admin','$user'=>$user,'url'=>'/users/admin/'])
@endsection
