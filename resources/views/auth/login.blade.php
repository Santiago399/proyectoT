@extends('layouts.main', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('/img/fondo4.jpg'),
])

@section('content')
    <div class="content">
        <div class="container">
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="info-area info-horizontal">
                  <div class="description">
                    <div class="info-area info-horizontal mt-5">
                        <img src="{{ asset('/img/Login-cuate.png') }}" alt="" srcset="">
                      </div>
                  </div>
                </div>
            </div>
        <div class="col-md-4 ml-auto mr-auto">
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
            <div class="card card-login card-plain">
                <div class="card-header ">
                    <div class="container">
                       <center> <img src="{{ asset('/img/nuevo.png') }}" alt=""></center>
                    </div>
                </div>
                <div class="card-body ">
                <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                    </div>
                    </span>
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" type="email" name="email" value="{{ old('email', 'admin@example.com') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i></i>
                    </div>
                    </div>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Contraseña') }}" type="password" value="secret" required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="card-footer ">
                <button  type = "submit" class="btn btn-primary btn-round btn-lg btn-block mb-3">{{ __('Ingresar') }}</button>
                <div class="pull-left">
                    <h6>
                    <a href="{{ route('register') }}" class="link footer-link">{{ __('Crear Nueva Cuenta') }}</a>
                    </h6>
                </div>
                <div class="pull-right">
                    <h6>
                    <a href="{{ route('password.request') }}" class="link footer-link">{{ __('¿Olvido Su Contraseña?') }}</a>
                    </h6>
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
