@extends('layouts.app')
@section('title', 'Cadastro de Usuários')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.css"/>
 
@endsection
@section('content')


<div class="container" style="padding-top: 1%;">
<div class="row">
    <div class="col-md-12">
        @include('partials._alert')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Relatório por veiculo e data</h3>
                </div>
            <!-- /.card-header -->
            {{ Form::open(['route' => 'reports', 'method' => 'POST']) }}
                <div class="card-body">
                <div id="app">
                    <div class="row">
                        <div class="col-md-2">
                            {{ Form::bsText('date', 'Data', null, ['class' => 'date'])}}
                        </div>
                        <div class="col-md-4">
                            <label for="car_id">Selecione o veículo</label>
                            <select class="form-control" name="car_id" id="car_id">
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->id }} - {{ $car->license_plate }} - {{ $car->model }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                        <button type="submit" class="btn btn-success">Buscar</button>
                        </div>
                    </div>
                    <input type="hidden" id="booked_in"  name="booked_in" value="">
                    <div class="row">
                        @isset($report)
                            @foreach($report as $r)
                            <ul>
                                <li>Modelo: {{ $r->car->model }}</li>
                                <li>Marca: {{ $r->car->brand }}</p>
                                <li>Placa: {{ $r->car->license_plate }}</li>
                                <li>Ano: {{ $r->car->year_of_manufacture }}</li>
                                <li>Usuário: {{ $r->user->name }}</li>
                                <li>Email: {{ $r->user->email }}</li>
                                <li>Cadastrado em: {{ $r->user->created_at }}</li>
                            </ul>

                            @endforeach
                        @else
                        <p>Nenhum registro encontrado</p>
                        @endif
                    </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.js"></script>
<script src="{{ mix('/js/app.js') }}" ></script>

<script>

import datepicker from 'js-datepicker'
const picker = datepicker('.some-input', { position: 'tl' })

</script>
@endsection