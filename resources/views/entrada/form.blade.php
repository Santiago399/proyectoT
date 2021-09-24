@extends('layout')
@section('title', $entrada ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $entrada ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('entrada.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$entrada->id}}">

<div class="mb-3 row">
    <label for="fecha" class="col-sm-2 col-form-label">fecha</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="fecha" name='fecha' value="{{@old('fecha') ? @old('fecha') : $entrada->fecha}}">
    </div>
    @error('fecha')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>


<div class="mb-3 row">
    <label for="proveedor" class="col-sm-2 col-form-label">Proveedor</label>
    <div class="col-sm-10">
        <select name="proveedor" class="form-select">
        @foreach ($proveedores as $proveedor )

        <option value="{{ $proveedor->id }}" {{ $proveedor->id == $entrada->proveedor_id ? "selected" : "" }} >{{ $proveedor->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('proveedor')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror


<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/entradas" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
