@extends('layout')
@section('title', $proveedor ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $proveedor ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('proveedor.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$proveedor->id}}">

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>

            @endforeach
        </ul>
        </div>
    @endif --}}

<div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $proveedor->nombre}}">
    </div>
    @error('nombre')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>

<div class="mb-3 row">
    <label for="apellido" class="col-sm-2 col-form-label">apellido</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="apellido" name='apellido' value="{{@old('apellido') ? @old('apellido') : $proveedor->apellido}}">
    </div>
    @error('apellido')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>
<div class="mb-3 row">
    <label for="celular" class="col-sm-2 col-form-label">celular</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="celular" name='celular' value="{{@old('nombre') ? @old('celular') : $proveedor->celular}}">
    </div>
    @error('celular')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>
<div class="mb-3 row">
    <label for="correo" class="col-sm-2 col-form-label">correo</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="correo" name='correo' value="{{@old('correo') ? @old('correo') : $proveedor->correo}}">
    </div>
    @error('correo')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>



<div class="mb-3 row">
    <label for="estado" class="col-sm-2 col-form-label">estado</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="estado" name='estado' value="{{@old('estado') ? @old('estado') : $proveedor->estado}}">
    </div>
    @error('estado')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>



<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/proveedores" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>


@endsection
