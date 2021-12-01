@extends('layouts.main', [
    'namePage' => 'entradaMateriales',
    'class' => 'sidebar-mini',
    'activePage' => 'entradaMateriales',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <form action="{{ route('entradaMateriales.store') }}" method="POST">
                  @csrf
                  <div class="panel panel-footer">
                    <table id="emptbl" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Material</th>
                          <th>Entrada id</th>
                          <th>Cantidad</th>
                          <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="col0">
                            <select name="material_id[]" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                              <option value="">--Escoja  el material --</option>
                              @foreach ($materiales as $material)
                              <option value="{{ $material['id'] }}">{{ $material['nombre'] }}</option>
  
                              @endforeach
                          </select>
                          </td>
                          <td id="col1">
                            <select name="entrada_id[]" id="entrada_id" class="form-control form-control-alternative{{ $errors->has('entrada_id') ? ' is-invalid' : '' }}">
                              <option value="">--Escoja  el entrada --</option>
                              @foreach ($entradas as $entrada)
                              <option value="{{ $entrada['id'] }}">{{ $entrada['fecha'] }}</option>
  
                              @endforeach
                          </select>
                          </td>
                          
                          <td id="col2">
                            <input type="number" name="cantidad[]" id="cantidad" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad') }}" value="{{ old('cantidad') }}">
                          </td>
                          <td id="col3">
                            <input type="text" name="estado[]" id="estado[]" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado') }}" value="{{ old('estado') }}" >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table>
                      <br>
                      <tr>
                        <tr>
                          <td><button type="button" class="btn btn-sm btn-info" onclick="addRows()">Añadir</button></td>
                          <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">Remover</button></td>
                          <td><button type="submit" class="btn btn-sm btn-primary">Guardar</button></td>
                        </tr>
                      </tr>
                    </table>
                  </div>
                </form>
              </div>
          </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Registros de Entrada Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Entrada id</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                
                  @forelse ($entradaMateriales as $entradaMaterial )
                  <tr>
                    <td>{{ $entradaMaterial->id }}</td>
                    <td>{{ $entradaMaterial->material->nombre }}</td>
                    <td>{{ $entradaMaterial->entrada_id}}</td>
                    <td>{{ $entradaMaterial->cantidad }}</td>
                    <td>{{ $entradaMaterial->estado }}</td>
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $entradaMateriales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

<script>
  function addRows()
  { 
      var table = document.getElementById('emptbl');
      var rowCount = table.rows.length;
      var cellCount = table.rows[0].cells.length; 
      var row = table.insertRow(rowCount);
      for(var i =0; i <= cellCount; i++)
      {
          var cell = 'cell'+i;
          cell = row.insertCell(i);
          var copycel = document.getElementById('col'+i).innerHTML;
          cell.innerHTML=copycel;
      }
  }

  function deleteRows()
  {
      var table = document.getElementById('emptbl');
      var rowCount = table.rows.length;
      if(rowCount > '2')
      {
          var row = table.deleteRow(rowCount-1);
          rowCount--;
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No puedes eliminar la última fila',
      });
      }
  }
</script>
@endsection
