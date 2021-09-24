@extends('layout')
@section('title', $entradaMaterial->id ?'Editar Material' : 'nuevo Material')
@section('palabra', $entradaMaterial->id ?'Editar Material' : 'Nuevo Material')

@section('content')
<form action=" {{ route('entradaMaterial.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$entradaMaterial->id}}">

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
    <label for="entrada" class="col-sm-2 col-form-label">entradas</label>
    <div class="col-sm-10">
        <select name="entrada" class="form-select">
        @foreach ($entradas as $entrada )

        <option value="{{ $marca->id }}" {{ $entrada->id == $material->entrada_id ? "selected" : "" }} >{{ $entrada->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('entrada')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror

</div>

<div class="mb-3 row">
    <label for="material" class="col-sm-2 col-form-label">material</label>
    <div class="col-sm-10">
        <select name="material" class="form-select">
        @foreach ($materiales as $material )

        <option value="{{ $material->id }}" {{ $material->id == $entradaMaterial->material_id ? "selected" : "" }} >{{ $material->nombre }}</option>


        @endforeach

        </select>
    </div>
    @error('material')
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
