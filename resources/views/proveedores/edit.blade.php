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
            <form method="post" action="{{ route('proveedores.update', $proveedor->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{__(" Nombre")}}</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $proveedor->nombre) }}">
                        @include('alerts.feedback', ['field' => 'nombre'])
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{__(" apellido")}}</label>
                        <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $proveedor->apellido) }}">
                        @include('alerts.feedback', ['field' => 'apellido'])
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{__(" celular")}}</label>
                        <input type="text" name="celular" class="form-control" value="{{ old('celular', $proveedor->celular) }}">
                        @include('alerts.feedback', ['field' => 'celular'])
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">{{__(" Correo Electrónico")}}</label>
                      <input type="email" name="correo" class="form-control" placeholder="correo" value="{{ old('correo', $proveedor->correo) }}">
                      @include('alerts.feedback', ['field' => 'correo'])
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{__(" estado")}}</label>
                            <input type="text" name="estado" class="form-control" value="{{ old('estado', $proveedor->estado) }}">
                            @include('alerts.feedback', ['field' => 'estado'])
                        </div>
                </div>
                <hr class="half-rule"/>
                {{-- show user --}}
                @can('usuarios.index')


                
                @endcan
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Actualizar')}}</button>
              </div>

            </form>
          </div>

      </div>
    </div>
      
  </div>
@endsection
