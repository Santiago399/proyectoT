@extends('layouts.main', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header" style="height: 2px;
padding-top: 30px;
padding-bottom: 45px;">

</div>
<br>
  <div class="row">
      <div class="col-lg-12">
      </div>
  </div>
  <div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cantidad de Entradas - Ultimos cinco dias</h5>
                    <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:560px;" data-ps-id="6c59f569-947c-0835-466d-192808c3ac96">
                    <!-- Comment Row -->

                    <canvas id="entradas_grafico" width="300px" height="200px"></canvas>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cantidad de Salidas</h5>
                    <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:560px;" data-ps-id="6c59f569-947c-0835-466d-192808c3ac96">
                    <!-- Comment Row -->

                    <canvas id="salidas_grafico" width="300px" height="200px"></canvas>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card  card-tasks">
          <div class="card-header ">
            {{-- <h5 class="card-category"></h5> --}}
            <h4 class="card-title">Top 5 Materiales</h4>
          </div>
          <div class="card-body ">
            <div class="table-full-width table-responsive">
              <table class="table">
                <tbody>
                     @foreach ($materiales as $material)
                <tr>
                    <td class="text-left">{{ $material->nombre }}</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                        <i class="now-ui-icons ">{{ $material->cantidad}}</i>
                      </button>
                      {{-- <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                      </button> --}}
                    </td>
                    <td>
                        {{-- {{ $materiales->nombre }} --}}
                    </td>
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              {{-- <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Descripciones de las Obras </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="obras">
                <thead class=" text-primary">
                    <tr>
                      <th>ID</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Entrega</th>

                      <th>Descripcion</th>
                    <th class="text-right">Nombre</th>
                  </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')


{{-- <script>
    $('#obras').DataTable({
                "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "order": [[ 0, "asc" ]],
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ajax": "{{ route('ajax.request.obras')}}",
                "columns":[
                {"data":"id"},
                {"data":"fechaInicio"},
                {"data":"fechaEntrega"},
                {"data":"descripcion"},
                {"data":"nombre"},
                ],

    });
</script> --}}

<script>
const ctx = document.getElementById('entradas_grafico').getContext('2d');
let diaEntrada=@json($dias_entrada);
let tagPrimerDia=diaEntrada[0][0]['primer_dia'];
let tagSegundoDia=diaEntrada[1][0]['segundo_dia'];
let tagTercerDia=diaEntrada[2][0]['tercer_dia'];
let tagCuartoDia=diaEntrada[3][0]['cuarto_dia'];
let tagQuintoDia=diaEntrada[4][0]['quinto_dia'];
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Hace 5 dias', 'Hace 4 dias', 'Hace 3 dias', 'Antes de Ayer', 'Ayer'],
        datasets: [{
            label:'Estadistica por Dia',
            data: [tagPrimerDia, tagSegundoDia, tagTercerDia, tagCuartoDia, tagQuintoDia],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const ctx_salida = document.getElementById('salidas_grafico').getContext('2d');
let dias_salidas=@json($dias_salidas);
let tagPrimerDiaSalida=dias_salidas[0][0]['primer_dia'];
let tagSegundoDiaSalida=dias_salidas[1][0]['segundo_dia'];
let tagTercerDiaSalida=dias_salidas[2][0]['tercer_dia'];
let tagCuartoDiaSalida=dias_salidas[3][0]['cuarto_dia'];
let tagQuintoDiaSalida=dias_salidas[4][0]['quinto_dia'];
const myChartSalida = new Chart(ctx_salida, {
    type: 'bar',
    data: {
        labels: ['Hace 5 dias', 'Hace 4 dias', 'Hace 3 dias', 'Antes de Ayer', 'Ayer'],
        datasets: [{
            label:'Estadistica por Dia',
            data: [tagPrimerDiaSalida, tagSegundoDiaSalida, tagTercerDiaSalida, tagCuartoDiaSalida, tagQuintoDiaSalida],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 2, 32, 1)',
                'rgba(54, 162, 35, 1)',
                'rgba(255, 206, 186, 1)',
                'rgba(75, 192, 292, 1)',
                'rgba(153, 102, 55, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


@endpush

