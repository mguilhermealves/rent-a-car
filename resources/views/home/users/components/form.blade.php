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
                        <div class="col-md-9">
                        {{ Form::bsText('name', 'Nome')}}
                        </div>
                        <div class="col-md-3">
                        {{ Form::bsText('cpf', 'CPF')}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::bsText('email', 'E-Mail')}}
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




