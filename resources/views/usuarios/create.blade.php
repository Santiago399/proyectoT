@extends('layouts.main', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nuevo Usuario")}}</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('usuarios.store') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
            
                            @include('alerts.success')
            
                            <div class="form-row">
                                <div class="form-group col-md-4{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('name') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                
                                <div class="form-group col-md-4{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email address') }}</label>
                                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}" value="{{ old('email') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                
                                <div class="form-group col-md-4{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{ _('Contraseña') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
                
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
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
                                                                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $id }}">
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


  </div>