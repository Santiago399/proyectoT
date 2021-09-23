@extends('layout')
@section('title', $obra ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $obra ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('obra.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$obra->id}}">

<div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $obra->nombre}}">
    </div>
    @error('nombre')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="fechaInicio" class="col-sm-2 col-form-label">fechaInicio</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="fechaInicio" name='fechaInicio' value="{{@old('fechaInicio') ? @old('fechaInicio') : $obra->fechaInicio}}">
    </div>
    @error('fechaInicio')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>
<div class="mb-3 row">
    <label for="fechaEntrega" class="col-sm-2 col-form-label">fechaEntrega</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="fechaEntrega" name='fechaEntrega' value="{{@old('fechaEntrega') ? @old('fechaEntrega') : $obra->fechaEntrega}}">
    </div>
    @error('fechaEntrega')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="estado" class="col-sm-2 col-form-label">estado</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="estado" name='estado' value="{{@old('estado') ? @old('estado') : $obra->estado}}">
    </div>
    @error('estado')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="cantidadMaterial" class="col-sm-2 col-form-label">cantidadMaterial</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="cantidadMaterial" name='cantidadMaterial' value="{{@old('cantidadMaterial') ? @old('cantidadMaterial') : $obra->cantidadMaterial}}">
    </div>
    @error('cantidadMaterial')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="tipoMaterial" class="col-sm-2 col-form-label">tipoMaterial</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="tipoMaterial" name='tipoMaterial' value="{{@old('tipoMaterial') ? @old('tipoMaterial') : $obra->tipoMaterial}}">
    </div>
    @error('tipoMaterial')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="cliente" class="col-sm-2 col-form-label">cliente</label>
    <div class="col-sm-10">
        <select name="cliente" class="form-select">
        @foreach ($clientes as $cliente )

        <option value="{{ $cliente->id }}" {{ $cliente->id == $obra->cliente_id ? "selected" : "" }} >{{ $cliente->nombre }}</option>

        @endforeach
        </select>
    </div>
     @error('cliente')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="categoria" class="col-sm-2 col-form-label">categoria</label>
    <div class="col-sm-10">
        <select name="categoria" class="form-select">
        @foreach ($categorias as $categoria )

        <option value="{{ $categoria->id }}" {{ $categoria->id == $obra->categoria_id ? "selected" : "" }} >{{ $categoria->nombre }}</option>

        @endforeach
        </select>
    </div>
    @error('categoria')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="usuario" class="col-sm-2 col-form-label">usuario</label>
    <div class="col-sm-10">
        <select name="usuario" class="form-select">
        @foreach ($usuarios as $usuario )

        <option value="{{ $usuario->id }}" {{ $usuario->id == $obra->usuario_id ? "selected" : "" }} >{{ $usuario->rol_id }}</option>

        @endforeach
        </select>
    </div>
     @error('usuario')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>



<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/obras" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
