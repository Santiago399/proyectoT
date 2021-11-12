{{-- @can('materiales.edit')
    <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $material->id}}" ><i class="now-ui-icons ui-2_settings-90"></i></a>

     @endcan
     @can('materiales.destroy')
        <form action="{{ route('materiales.destroy', $id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
         @csrf
        @method('DELETE')
            <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                 <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
        </form>
@endcan --}}

@can('materiales.destroy')
<form action="{{ route('materiales.destroy', $id) }}" method="POST">
@endcan
@can('materiales.edit')
    <a href="{{ rote('meteriales.edit', $id)}}"  class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
@endcan
<input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm btn-icon"
onclick="return confirm('Are You Sure?')">
</form>


