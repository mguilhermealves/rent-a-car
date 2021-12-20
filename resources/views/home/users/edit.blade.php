@extends('layouts.app')
@section('title', "Editar Usuário")
@section('description', "Editar Usuário")
@section('content')
@component('home.users.components.form')
{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) }}
@endcomponent
@endsection