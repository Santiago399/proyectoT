<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            {{-- <img src="{{asset('img/logo_l.png') }}" alt="" srcset="" class="simple-text logo-mini"> --}}
            <a href="{{ asset('img/logo_l.png') }}" class="simple-text logo-mini">{{ _('') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'usuarios') class="active " @endif>
                <a href="/usuarios/index">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Usuarios') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Inventario') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'Marcas') class="active " @endif>
                            <a href="/marcas/index">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Marcas') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li @if ($pageSlug == 'tipoMateriales') class="active " @endif>
                <a href="/tipoMateriales/index">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Tipo Materiales') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'proveedores') class="active " @endif>
                <a href="/proveedores/index">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ _('Proveedores') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'usuarios' ? 'active' : 'Usuarios' }} bg-info">
                <a href="">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>



