@extends('layout')
@section('title', $material->id ?'Editar Material' : 'nuevo Material')
@section('palabra', $material->id ?'Editar Material' : 'Nuevo Material')

@section('content')
<form action=" {{ route('material.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$material->id}}">

<div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $material->nombre}}">
    </div>
    @error('nombre')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="peso" class="col-sm-2 col-form-label">peso</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="peso" name='peso'value="{{@old('peso') ? @old('peso') :  $material->peso }}">
    </div>
    @error('peso')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="tamaño" class="col-sm-2 col-form-label">tamaño</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="tamaño" name='tamaño' value="{{@old('tamaño') ? @old('tamaño') : $material->tamaño}}">
    </div>
    @error('tamaño')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="cantidad" class="col-sm-2 col-form-label">cantidad</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="cantidad" name='cantidad' value="{{@old('cantidad') ? @old('cantidad') : $material->cantidad}}">
    </div>
    @error('cantidad')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="estado" class="col-sm-2 col-form-label">estado</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="estado" name='estado' value="{{@old('estado') ? @old('estado') : $material->estado}}">
    </div>
    @error('estado')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="tipoMaterial" class="col-sm-2 col-form-label">Tipo Material</label>
    <div class="col-sm-10">
        <select name="tipoMaterial" class="form-select">
        @foreach ($tipoMateriales as $tipoMaterial )

        <option value="{{ $tipoMaterial->id }}" {{ $tipoMaterial->id == $material->tipo_id ? "selected" : "" }} >{{ $tipoMaterial->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('tipoMaterial')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror

</div>

<div class="mb-3 row">
    <label for="marca" class="col-sm-2 col-form-label">Marcas</label>
    <div class="col-sm-10">
        <select name="marca" class="form-select">
        @foreach ($marcas as $marca )

        <option value="{{ $marca->id }}" {{ $marca->id == $material->marca_id ? "selected" : "" }} >{{ $marca->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('marca')
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

        <option value="{{ $proveedor->id }}" {{ $proveedor->id == $material->proveedor_id ? "selected" : "" }} >{{ $proveedor->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('proveedor')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror

</div>







<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/materiales" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
