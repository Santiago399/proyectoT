@extends('layouts.main', [
    'namePage' => 'pedidos',
    'class' => 'sidebar-mini',
    'activePage' => 'pedidos',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                
                <a href="{{ route('pedidos.create') }}" class="btn btn-sm btn-primary">Añadir Pedido</a>
                
              </div>
            <h4 class="card-title"> Pedidos </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                  <th>ID</th>
                  <th>Codigo</th>
                  <th>fecha de creacion</th>
                  <th>FechaEnvio</th>
                  <th>Material_id</th>
                  <th>Cantidad</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($pedidos as $pedido )
                  <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->codigo}}</td>
                    <td>{{ $pedido->created_at}}</td>
                    <td>{{ $pedido->fechaEnvio }}</td>
                    @foreach ( $materiales as $material )
                    <td><a href="{{ route('materiales.show', $material->id)}}">Ver Material</a> </td>
                    
                    @endforeach
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ $pedido->descripcion}}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td class="text-right" >
                        
                        <a href="{{ route('pedidos.edit', $pedido->id)}}" class="btn btn-gray btn-sm btn-icon" > <i class="now-ui-icons ui-2_settings-90"></i></a>
                        
                        {{-- @can('pedidos.destroy')
                        <form action="{{ route('salidas.destroy', $salida->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                  <i >Eliminar</i>
                            </button>
                        </form>
                        @endcan --}}
                      </td>
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{-- {{ $salidas->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
