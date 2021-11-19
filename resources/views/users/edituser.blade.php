@extends('layouts.app')
@section('content')
@include('users.form',['title'=>"Editar usuario",'user_type'=>"user",'$user'=>$user,'url'=>'/users/user/'])
@endsection
