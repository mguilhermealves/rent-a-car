@component('components.form.partials._group')
    @slot('name', $name)
    @slot('label', $label)
    <div class="input-group">
      {{-- <input type="password" class="form-control" value="{{ count($attributes) ? $attributes : '' }}" name="{{ $name }}" id="{{ $name }}"> --}}
      {{ is_array($attributes) }}
      {{ count($attributes) }}
      <input type="password" class="form-control" value="{{ is_array($attributes) ? count($attributes) : '' }}" name="{{ $name }}" id="{{ $name }}">
      <span class="input-group-btn">
        <a class="btn btn-default senha" href="" data-id="{{$name}}" onclick="mostraSenha(this); return false;"><i class="fa fa-eye"></i></a>
      </span>
    </div>
@endcomponent
