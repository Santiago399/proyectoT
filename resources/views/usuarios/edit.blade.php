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
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Editar perfil")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('usuarios.update', $usuario->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{__(" Nombre")}}</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $usuario->name) }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{__(" Apellido")}}</label>
                        <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $usuario->apellido) }}">
                        @include('alerts.feedback', ['field' => 'apellido'])
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">{{__(" Correo Electrónico")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $usuario->email) }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{__(" Celular")}}</label>
                            <input type="text" name="celular" class="form-control" value="{{ old('celular', $usuario->celular) }}">
                            @include('alerts.feedback', ['field' => 'celular'])
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{__(" Dirección")}}</label>
                            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $usuario->direccion) }}">
                            @include('alerts.feedback', ['field' => 'direccion'])
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{__(" Contraseña")}}</label>
                            <input type="number" name="password" class="form-control" value="{{ old('password', $usuario->password) }}"
                            placeholder="Ingrese la contraseña soló en caso de modificarla " >
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                </div>
                <hr class="half-rule"/>
                {{-- show user --}}
                @can('usuarios.index')


                <div class="card-header">
                    <h5 class="title">{{__("Roles")}}</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
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
                    </div>
                </div>
                @endcan
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Actualizar')}}</button>
              </div>

            </form>
          </div>

      </div>
    </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('/img/bg5.jpg')}}" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('/img/default-avatar.png')}}" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{-- <strong> Correo:</strong> {{ auth()->user()->email }}
                  <hr>
                 <strong> Apellido:</strong> {{ auth()->user()->apellido }}
                  <hr>
                  <strong>Fecha de creación:</strong> {{ auth()->user()->created_at }} --}}
                  <strong>Correo:</strong> {{ $usuario->email }}   <br>
                <strong>Fecha de creación:</strong> {{ $usuario->created_at }}  <br>
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
