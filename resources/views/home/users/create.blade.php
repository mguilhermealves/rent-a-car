@extends('layouts.app')
@section('title', 'Novo Usuário')
@section('description', 'Novo Usuário')
@section('content')
@component('home.users.components.form')
{{ Form::open(['route' => 'users.store', 'method' => 'POST']) }}
@endcomponent
@endsection