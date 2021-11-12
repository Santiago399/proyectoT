@extends('layouts.main', [
    'namePage' => 'usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'usuarios',
  ])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Editar Usuario</h5>
                    </div>

                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="post"   class="form-horizontal">
                        @csrf
                        @method('PUT')
                        @include('alerts.success')

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('nombre') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{  old('name', $usuario->name )}}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Correo') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{  old('email', $usuario->email) }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">{{ __('Contraseña') }}</label>
                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Ingrese la contraseña soló en caso de modificarla " >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @can('usuarios.index')


                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-contect">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($roles as $id => $role )
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $id }}" {{ $usuario->roles->contains($id) ? 'checked' : '' }}>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $role }}
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
                            @endcan
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                            </div>
                        </div>

                    </form>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>
@endsection
