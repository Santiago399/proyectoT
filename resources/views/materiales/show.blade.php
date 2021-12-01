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
            <h5 class="title">{{__("Detalle del Material -")}}  <td>{{ $material->nombre }}</td></h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="materiales">
                <thead class=" text-primary">
                  <tr>
                
                      <td>Nombre</td>
                      <td>Peso</td>
                      <td>Tamaño</td>
                      <td>Cantidad</td>
                      <td>tipo ID</td>
                      <td>Marca ID</td>
                      <td>Estado</td>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $material->nombre }}</td>
                <td>{{ $material->peso }}</td>
                <td>{{ $material->tamaño }}</td>
                <td>{{ $material->cantidad }}</td>
                <td>{{ $material->tipo->nombre }}</td>
                <td>{{ $material->marca->nombre }}</td>
                <td>{{ $material->estado }}</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
