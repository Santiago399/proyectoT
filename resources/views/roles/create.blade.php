@extends('layouts.main', [
    'namePage' => 'roles',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',
  ])

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear rol') }}</h5>
    </div>
    <form action="{{ route('roles.store') }}" method="post"   class="form-horizontal">
        @csrf
        <div class="pl-lg-4">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Nombre del rol') }}</label>
                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>
                @error('name')
                <small class="text-danger">
                    {{ $message }}
                </small>

                @enderror

            </div>

        </div>

        <div class="row">
            <label for="name" class="col-sm-2 col-form-label">Permisos</label>
            <div class="col-sm-7">
                <div class="form-group">
                    <div class="tab-contect">
                        <div class="tab-pane active">
                            <table class="table">
                                <tbody>
                                    @foreach ($permissions as $id => $permission  )
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $id}}">

                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $permission->description }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
        </div>

    </form>
    <hr class="my-4" />
</div>


@endsection
