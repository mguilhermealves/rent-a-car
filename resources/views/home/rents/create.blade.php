@extends('layouts.app')
@section('title', 'Nova Locação')
@section('description', 'Nova Locação')
@section('content')
@component('home.rents.components.form')
@slot('users', $users)
{{ Form::open(['route' => 'rents.store', 'method' => 'POST']) }}
@endcomponent
@endsection