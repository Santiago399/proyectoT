@extends('layouts.main', ['title' => __('Nuevo Permiso')])

@section('content')


<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-orange border-1">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Permisos') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="post"   class="form-horizontal">
                @csrf


                <h6 class="heading-small text-muted mb-4">{{ __(' Formulario Permisos') }}</h6>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="pl-lg-4">
                    <div class="form-row">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre del permiso') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="description">{{ __('descripcion del permiso') }}</label>
                            <input type="text" name="description" id="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" autofocus>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>
                </div>

            </form>
            <hr class="my-4" />

        </div>
    </div>
</div>


@endsection
