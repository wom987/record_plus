@extends('layouts.app')
@section('content')
   @include('users.createform',['title'=>"Agregar Usuario",'user_type'=>'user','url'=>'/users/createuser/'])
@endsection
