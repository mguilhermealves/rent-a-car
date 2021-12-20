<div class="container" style="padding-top: 1%;">
<div class="row">
    <div class="col-md-12">
        @include('partials._alert')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@yield('description')</h3>
                </div>
            <!-- /.card-header -->
            {{ $slot }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        {{ Form::bsText('brand', 'Marca')}}
                        </div>
                        <div class="col-md-4">
                        {{ Form::bsText('model', 'Modelo')}}
                        </div>
                        <div class="col-md-2">
                        {{ Form::bsText('license_plate', 'Placa')}}
                        </div>
                        <div class="col-md-2">
                        {{ Form::bsText('year_of_manufacture', 'Ano')}}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer pull-right">
                <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                <!-- /.card-footer -->
            </div>
            {{ Form::close() }}
    </div>
</div>
</div>




