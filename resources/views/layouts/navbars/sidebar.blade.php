<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
      {{-- <a href="#" class="simple-text logo-mini">

      </a> --}}
      {{-- <a href="#" class="simple-text logo-normal">
          <img src="{{asset('/img/nuevo.png')}}" alt="">
      </a> --}}
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li>
          <a href="{{ route('home') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        <hr>
        @can('roles.index')
        <li>
          <a href="{{ route('roles.index') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Roles') }}</p>
          </a>
        </li>
        @endcan
        @can('permisos.index')
        <li>
          <a href="{{ route('permissions.index') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Permisos') }}</p>
          </a>
        </li>
        @endcan

          @can('usuarios.index')
        <li>
          <a href="{{ route('usuarios.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Usuarios') }}</p>
          </a>
        </li>
        @endcan
        @can('proveedores.index')
        <li>
          <a href="{{ route('proveedores.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Proveedores') }}</p>
          </a>
        </li>
        @endcan
        @can('clientes.index')
        <li>
          <a href="{{ route('clientes.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Clientes') }}</p>
          </a>
        </li>
        @endcan
        <hr>
        <h6 style="color:#fff; text-align:center">Configuración Inicial</h6>
        <hr>
        @can('tipoMateriales.index')
        <li>
          <a href="{{ route('tipoMateriales.index') }}">
            <i class="now-ui-icons location_map-big"></i>
            <p>{{ __('Tipo Materiales') }}</p>
          </a>
        </li>
        @endcan
        @can('marcas.index')
        <li>
          <a href="{{ route('marcas.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Marcas') }}</p>
          </a>
        </li>
        @endcan
        @can('categorias.index')
        <li >
          <a href="{{ route('categorias.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Categorias') }}</p>
          </a>
        </li>
        @endcan
        <hr>
        <h6 style="color:#fff; text-align:center">OPERACIÓN</h6>
        <hr>

        @can('obras.index')
        <li>
          <a href="{{ route('obras.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Obras') }}</p>
          </a>
        </li>
        @endcan
        @can('materiales.index')
        <li>
          <a href="{{ route('materiales.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Materiales') }}</p>
          </a>
        </li>
        @endcan
        {{-- @can('entradas.index')
        <li>
          <a href="{{ route('entradas.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Entradas') }}</p>
          </a>
        </li>
        @endcan --}}
        @can('entradaMateriales.index')
        <li>
          <a href="{{ route('entradaMateriales.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('entrada Materiales') }}</p>
          </a>
        </li>
        @endcan

        {{-- @can('salidas.index')
        <li>
          <a href="{{ route('salidas.index') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>{{ __('Salidas') }}</p>
          </a>
        </li>
        @endcan --}}
        @can('salidasMateriales.index')
        <li>
          <a href="{{ route('salidaMateriales.index') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>{{ __('Salida Material') }}</p>
          </a>
        </li>
        @endcan
        @can('categorias')
        <li>
          <a href="{{ route('categorias.index') }}">
            <i class="now-ui-icons text_caps-small"></i>
            <p>{{ __('Categorias') }}</p>
          </a>
        </li>
        @endcan

      </ul>
    </div>
  </div>
