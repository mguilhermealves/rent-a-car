@extends('layouts.app')
@section('title', 'Novo Veículo')
@section('description', 'Novo Veículo')
@section('content')
@component('home.cars.components.form')
{{ Form::open(['route' => 'cars.store', 'method' => 'POST']) }}
@endcomponent
@endsection