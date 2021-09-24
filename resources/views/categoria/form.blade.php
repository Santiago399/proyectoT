@extends('layout')
@section('title', $categoria ->id ?'Editar ---' : 'Nuevo ---')
@section('palabra', $categoria ->id ?'Editar ---' : 'Nuevo ---')

@section('content')
<form action=" {{ route('categoria.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$categoria->id}}">

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
        <input type="text" class="form-control" id="nombre" name='nombre' value="{{@old('nombre') ? @old('nombre') : $categoria->nombre}}">
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
        <a href="/categorias" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>


@endsection
