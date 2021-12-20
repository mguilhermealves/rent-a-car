@if(session()->has('success'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Sucesso!</h5>
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Opa!</h5>
        {!! session()->get('warning') !!}
</div>
@endif


@if(session()->has('danger'))

<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Atenção!</h5>
{{ session()->get('danger') }}
</div>

@endif

@if($errors->any())

<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Ops!</h5>
@foreach($errors->all() as $error)
    <ul>
        <li>{{ $error }}</li>   
    </ul>         
@endforeach
</div>

@endif
