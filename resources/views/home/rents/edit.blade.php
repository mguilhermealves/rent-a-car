@extends('layouts.app')
@section('title', "Editar Locação")
@section('description', "Editar Locação")
@section('content')
@component('home.rents.components.form')
@slot('users', $users)
@slot('rent', $rent)
{{ Form::model($rent, ['route' => ['rents.update', $rent->id], 'method' => 'PUT']) }}
@endcomponent
@endsection