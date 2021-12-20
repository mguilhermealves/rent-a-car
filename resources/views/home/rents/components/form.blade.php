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

            @isset($rent)
            <script>
                
            </script>
            @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" id="app">
                            <datepicker-component>  </datepicker-component>
                        </div>
                        <div class="col-md-4">
                        <label for="car_id">Selecione</label>
                            <select class="form-control" name="car_id" id="car_id">
                                <option value="0">Selecione a data ao lado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{ Form::bsSelect('user_id', 'Selecione o usuário', $users)}}
                        </div>
                    </div>
                </div>
                <input type="hidden" id="booked_in"  name="booked_in" value="">
                <input type="hidden" id="datecalendar" name="datecalendar" value="{{ isset($rent) ? $rent->booked_in : ''}}" >
                <!-- /.card-body -->
                <div class="card-footer pull-right">
                <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                <!-- /.card-footer -->
            </div>
            {{ Form::close() }}
            <script src="{{ mix('/js/app.js') }}" ></script>
    </div>
</div>
</div>

<script>

import datepicker from 'js-datepicker'
const picker = datepicker('.some-input', { position: 'tl' })
</script>


