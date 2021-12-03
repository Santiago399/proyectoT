@extends('layouts.main', [
    'namePage' => 'obras',
    'class' => 'sidebar-mini',
    'activePage' => 'obras',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-primary" >
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-rigth">
            <h6>Import Exel</h6>
            </div>
          </div>
            <div class="card-body">
              <form action="/obras/import" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <input type="file" name="file" /> para importar da click aquí mismo
     <br>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            
            <div class="text-right">
                @can('obras.create')
                <a href="{{ route('obras.create')}}" class="btn btn-sm btn-primary">Añadir obra</a>
                @endcan
              </div>
            <h4 class="card-title"> Obras </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="obras">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Entrega</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($obras as $obra )
                  <tr>
                    <td>{{ $obra->id }}</td>
                    <td>{{ $obra->nombre }}</td>
                    <td>{{ $obra->fechaInicio }}</td>
                    <td>{{ $obra->fechaEntrega}}</td>
                    <td>{{ $obra->descripcion}}</td>
                    <td>{{ $obra->categoria->nombre }}</td>
                    <td>{{ $obra->usuario_id}}</td>
                    <td>{{ $obra->estado}}</td>
                    <td class="text-right"> 
                      <a href="{{ route('obras.edit', $obra->id)}}" class="btn btn-gray btn-sm btn-icon" > <i class="now-ui-icons ui-2_settings-90"></i></a>
                    </td>
                  </tr>
                  @empty 
                  No hay registros      
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection