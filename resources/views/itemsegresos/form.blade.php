<div class="h5 d-flex justify-content-center font-weight-bold text-white bg-secondary">
    {{ $Modo == 'crear' ? 'AGREGAR ITEM' : 'EDITAR ITEM'}}
</div> 
    

    <div class='form-group'> 
        <label for="Egreso" class='control-label'>{{'Egreso'}}</label>
        <select  class="form-control " name='egreso_id' for="egreso_id"> 
                @foreach ($egresos as $egreso)
                        <option value="{{$egreso->id}}"> {{$egreso->nombre}} </option>
                @endforeach
        </select >
    </div> 
    <div class='form-group'> 
        <label for="Nombre" class='control-label'>{{'Nombre'}}</label>
        <input  maxlength="25" type="text" name="nombreitem" class="form-control {{$errors->has('nombreitem')?  'is-invalid' : '' }}" id="nombreitem" value="{{ isset($item->nombreitem) ? $item->nombreitem:old('nombreitem') }}">
    </div>
    <div class='form-group'> 
        <label for="Cantidad" class='control-label'>{{'Cantidad'}}</label>
        <input onKeyPress="if(this.value.length==24) return false;" class="form-control {{$errors->has('cantidaditem')?  'is-invalid' : '' }}" type="number" name="cantidaditem" id="cantidaditem" value="{{ isset($item->cantidaditem) ? $item->cantidaditem:old('cantidaditem') }}">
    </div>

    
    <input class='btn btn-success btn-block' type="submit" value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar'}} ">
    <a class='btn btn-primary btn-block' href="{{ url('/itemsegresos') }}">Regresar</a>
