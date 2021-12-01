@extends('layouts.main', [
    'namePage' => 'categorias',
    'class' => 'sidebar-mini',
    'activePage' => 'categorias',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nueva categoria")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categorias.store') }}" method="post" class="form-horizontal">
                  @csrf
                  {{-- @foreach ($categorias as $categoria)
                  <input type="hidden" name="id" value="{{$categorias->id}}">
                  
                  @endforeach --}}
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}">                
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                
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
              </div>
            <h4 class="card-title"> Categorias </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @csrf
              <table id="editable" class="table table-bordered table-striped">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @foreach  ($categorias as $categoria)
                  <tr>
                    <td class="id">{{ $categoria->id }}</td>
                    <td class="nombre">{{ $categoria->nombre }}</td>
                    <td class="text-center">
                      @can('categorias.edit')
                      <a href="m-r-15 text-muted update" data-toggle="modal" data-id=".$categoria->id ." data-target="#update" class="btn btn-gray btn-sm btn-icon"> 
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                      @endcan
                      @can('categorias.destroy')
                      <a href="" class="btn btn-danger btn-sm btn-icon" onclick="return confirm('Are you sure want to delete it?')">
                        <i class="now-ui-icons ui-1_simple-remove"></i></a>
                    </td>
                    @endcan
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
  {{-- modal update --}}
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <form action="" id="update" method="post">
            {{ csrf_field() }}
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="e_id" name="id" value=""/>
          <div class="modal-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label"> Nombre </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="e_nombre" name="nombre" value=""/>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
  {{-- end modal update --}}
@endsection

@section('js')
<script>
  $(document).on('click','update',function()
  {
    var_this = $(this).parents('tr');
    $('$e_id').val(_this.find('.id').text())
    $('$e_nombre').val(_this.find('.nombre').text())
  });
</script>


@endsection

