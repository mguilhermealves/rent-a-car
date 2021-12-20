@extends('layouts.app')
@section('title', "Editar Veículo")
@section('description', "Editar Veículo")
@section('content')
@component('home.cars.components.form')
{{ Form::model($car, ['route' => ['cars.update', $car->id], 'method' => 'PUT']) }}
@endcomponent
@endsection