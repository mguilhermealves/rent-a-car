@extends('adminlte::page')

@section('content_header')
    @yield('content_header')
@stop

@section('content')       
    <div id="app">
        @yield('content')
    </div>
@stop

@section('css')
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
@stop

@section('js')
    @yield('js')
@stop
