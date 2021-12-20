@extends('layouts.app')
@section('title', 'Cadastro de Usuários')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.css"/>
 
@endsection
@section('content')


<div class="container" style="padding-top: 1%;">
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('users.create') }}" class="btn btn-success float-right">Novo Usuário</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-12">
        @include('partials._alert')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuários</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <div id="app">
                    <div class="row">
                        <div class="col-md-12">
                            <user-datatable-component></user-datatable-component>
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