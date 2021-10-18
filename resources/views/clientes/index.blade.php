@extends('layouts.main', [
    'namePage' => 'clientes',
    'class' => 'sidebar-mini',
    'activePage' => 'cleintes',
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
              <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary">Añadir cliente</a>
            </div>
            <h4 class="card-title"> clientes </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Clave</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($clientes as $cliente)
                  <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->clave }}</td>
                    <td class="text-right" >

                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm"><i class="ni ni-single-02">Detalle</i></a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm"><i class="ni ni-single-02">Edit</i></a>
                          <form action="{{ route('clientes.delete', $cliente->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                              <i class="ni ni-fat-remove ">Eliminar</i>
                            </button>
                          </form>
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
              {{ $clientes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
