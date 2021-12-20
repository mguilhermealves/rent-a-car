@extends('layouts.app')
@section('title', 'Cadastro de Usuários')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.css"/>
 
@endsection
@section('content')


<div class="container" style="padding-top: 1%;">
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('rents.create') }}" class="btn btn-success float-right">Nova Locação</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-12">
        @include('partials._alert')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Locações</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <div id="app">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Placa</th>
                                    <th>Usuário</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @foreach($rents as $rent)
                                        <tr>
                                            <td>{{ $rent->car->brand }} </td>
                                            <td>{{ $rent->car->model }} </td>
                                            <td>{{ $rent->car->license_plate }} </td>
                                            <td>{{ $rent->user->name }} </td>
                                            <td align="right">
                                                <a href="{{ route('rents.edit', $rent->id) }}" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                                                {{ Form::open(['route' => ['rents.destroy', $rent->id], 'method' => 'DELETE', 'id' => 'delete-form', 'onsubmit' => 'deleteForm(this);return false;', 'style' => 'display: inline-block;']) }}
                                                <button type="submit" class="btn btn-danger btn-flat btn-xs">
                                                <i class="fa fa-trash"></i>
                                                </button>                                    
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
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

@endsection