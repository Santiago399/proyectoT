@extends('layout')
@section('title', $tipoMaterial ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $tipoMaterial ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('tipoMaterial.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$tipoMaterial->id}}">

<div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $tipoMaterial->nombre}}">
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
        <a href="/tipoMateriales" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
