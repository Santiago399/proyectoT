@extends('layouts.main', [
    'namePage' => 'marcas',
    'class' => 'sidebar-mini',
    'activePage' => 'marcas',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <div class="container">
                    <h2>Marcas</h2>
                    <span id="message_error"></span>
                    <form id="validate" action="{{ route('marcas.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                    <table id="emptbl" class="table table-bordered border-primar">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="col0"><input type="text" name="nombres[]" id="nombres[]" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                             placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}" ></td>
                          </tr>
                      </tbody>
                    </table>
                    <table>
                      <br>
                      <tr>
                        <tr>
                          <td><button type="button" class="btn btn-sm btn-info " onclick="addRows()">Agregar</button></td>
                          <td><button type="button" class="btn btn-sm btn-danger " onclick="deleteRows()">Rewmover</button></td>
                          <td><button type="submit" class="btn btn-sm btn-primary" >save</button></td>
                        </tr>
                      </tr>
                    </table>
                    </div>
                    <input type="submit" value="submit">
                    </form>
                  </div>
              </div>
          </div>
        @if (session('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
        @endif
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="text-right">
          {{-- @can('marcas.create')
          <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir marca</a>
          @endcan --}}
      </div>
      <h4 class="card-title"> Marcas </h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" >
          
            <tr>
              <th hidden>ID</th>
              <th>Nombre</th>
              <th class="text-right">Acciones</th>
          
          
            @forelse ($marcas as $marca)
            <tr>
              <td hidden>{{ $marca->id }}  </td>
              <td>{{ $marca->nombre }}</td>
                  <td class="text-right" >
                      @can('marcas.edit')
                      <a href="{{ route('marcas.edit', $marca->id)}}" class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                      @endcan
                      @can('marcas.destroy')
                      <form action="{{ route('marcas.destroy', $marca->id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                              <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                      </form>
                      @endcan
                  </td>
                   
              </tr>
             @endforeach
          
        </table>
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

{{-- <script>
    $('thead').on('click', '.addRow', function(){
        var tr = '<tr>'+
            '<td><input type="text" name="nombres[]" id="nombres[]" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}"></td>'+
            '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
            '</tr>';

            $('tbody').append(tr);

    });

    $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
    })
</script> --}}


@endsection





