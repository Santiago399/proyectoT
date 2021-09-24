<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>@yield('titlt', 'laravel')</title>



    @yield('css')
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->

  </head>
  <body>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       {{ __('cerrar sesion') }}
   </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
       @csrf
   </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000">
              <span data-feather="home"></span>
              Inicio
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/proveedores">
              <span data-feather="shopping-cart"></span>
              Proveedores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/marcas">
              <span data-feather="shopping-cart"></span>
              Marcas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/materiales">
              <span data-feather="shopping-cart"></span>
              Materiales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/obras">
              <span data-feather="shopping-cart"></span>
              Obras
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorias">
              <span data-feather="shopping-cart"></span>
              Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tipoMateriales">
              <span data-feather="shopping-cart"></span>
              tipoMateriales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/entradaMateriales">
              <span data-feather="shopping-cart"></span>
              entradaMateriales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/clientes">
              <span data-feather="shopping-cart"></span>
              clientes
            </a>
          </li>



      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h1>@yield('palabra') </h1>

    </div>
    @yield('content')
</main>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>

