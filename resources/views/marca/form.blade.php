@extends('layout')
@section('title', $marca ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $marca ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('marca.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$marca->id}}">

<div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $marca->nombre}}">
    </div>
    @error('nombre')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>



<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/marca" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
