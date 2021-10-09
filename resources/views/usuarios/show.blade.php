@extends('layouts.main', ['page' => __('showUsuario'), 'pageSlug' => 'showUsuario'])

@section('content')

<div class="col-md-4">
    <div class="card card-user">
        <div class="card-body">
            <p class="card-text">
                <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="#">
                        <img class="avatar" src="{{ asset('/img/emilyz.jpg') }}" alt="">
                        <h5 class="title">{{ auth()->user()->name }}</h5>
                    </a>
                    <p class="description">
                        {{ _('Ceo/Co-Founder') }}
                    </p>
                </div>
            </p>
            <p class="descripcion">
                Correo: {{ $usuario->email }}   <br>
                Fecha de creación: {{ $usuario->created_at }}  <br>

             </p>
            <div class="card-description">
                {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
            </div>

        </div>
        <div class="card-footer">
            <div class="button-container">
                <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-success mr-3" >Volver</a>
                {{-- <a href="{{ route('usuarios.edit') }}" class="btn btn-sm btn-success mr-3" >Editar</a> --}}
                      <button class="btn btn-sm btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>
@endsection