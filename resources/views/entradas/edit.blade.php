@extends('layouts.main', ['title' => __('Editar entrada')])

@section('content')


<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-orange border-1">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Editar entrada') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('entradas.update', $entrada->id) }}" method="post"   class="form-horizontal">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">{{ __(' information') }}</h6>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Fecha') }}</label>
                        <input type="date" name="fecha" id="input-name" class="form-control form-control-alternative{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="{{ $entrada->fecha }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('proveedor_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('proveedor_id') }}</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-control form-control-alternative{{ $errors->has('proveedor_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el proveedor --</option>
                            @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor['id'] }}">{{ $proveedor['nombre'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('proveedor_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('proveedor_id') }}</strong>
                            </span>
                        @endif

                    </div>



                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                    </div>
                </div>

            </form>
            <hr class="my-4" />

        </div>
    </div>
</div>


@endsection
