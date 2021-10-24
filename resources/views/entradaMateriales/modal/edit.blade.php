<form action="{{ route('entradaMateriales.update', $entradaMaterial->id )}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{ $entradaMaterial->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Entrada Material') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('material_id') }}</label>
                        <select name="material_id" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el material --</option>
                            @foreach ($materiales as $material )

                                <option value="{{ $material->id }}" {{ $material->id == $entradaMaterial->material_id ? "selected" : "" }} >{{ $material->nombre }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('material_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('material_id') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('entrada_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('entrada_id') }}</label>
                        <select name="entrada_id" id="entrada_id" class="form-control form-control-alternative{{ $errors->has('entrada_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el entrada --</option>
                            @foreach ($entradas as $entrada )

                                <option value="{{ $entrada->id }}" {{ $entrada->id == $entradaMaterial->entrada_id ? "selected" : "" }} >{{ $entrada->fecha }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('entrada_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('entrada_id') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                        <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad', $entradaMaterial->cantidad) }}" autofocus>

                        @if ($errors->has('cantidad'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cantidad') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                        <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado', $entradaMaterial->estado) }}" autofocus>

                        @if ($errors->has('estado'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
