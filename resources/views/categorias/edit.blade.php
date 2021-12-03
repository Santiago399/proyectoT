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
            <form method="post" action="{{ route('categorias.update', $categoria->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{__(" Nombre")}}</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}">
                        @include('alerts.feedback', ['field' => 'nombre'])
                    </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Actualizar')}}</button>
              </div>

            </form>
          </div>

      </div>
    </div>
      
  </div>
@endsection
