<div class="h5 d-flex justify-content-center font-weight-bold">
    {{ $Modo == 'crear' ? 'AGREGAR INGRESO' : 'EDITAR INGRESO'}}
</div>

    <div class='form-group'> 
        <label for="Nombre" class='control-label'>{{'Nombre'}}</label>
        <!-- $ingreso->nombre:old('nombre') -> Para que no se pierda lo ingresado desp de un error -->
        <input maxlength="10" type="text" class="form-control {{$errors->has('nombre')?  'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ isset($ingreso->nombre) ? $ingreso->nombre:old('nombre') }}">
        {!! $errors->first('nombre','<div class="invalid-feedback"> :message </div>') !!}
        
    </div>
    <div class='form-group'> 
        <label for="Detalle" class='control-label'>{{'Detalle'}}</label>
        <input maxlength="25" type="text" name="detalle" class="form-control {{$errors->has('detalle')?  'is-invalid' : '' }}" id="detalle" value="{{ isset($ingreso-> detalle) ? $ingreso->detalle:old('detalle') }}">
    </div>
    <div class='form-group'> 
        <label for="Valor" class='control-label'>{{'Valor'}}</label>
        <input onKeyPress="if(this.value.length==24) return false;" class="form-control {{$errors->has('valor')?  'is-invalid' : '' }}" type="number" name="valor" id="valor" value="{{ isset($ingreso-> valor) ? $ingreso->valor:old('valor') }}">
    </div>
    <div class='form-group'> 
        <label for="Categoria" class='control-label'>{{'Categoria'}}</label>
        <select  class="form-control " name='categorias_ings_id' for="categorias_ings_id">

            @if (isset($categorias))
                @foreach ($categorias as $categoria)    
                    @if ($categoria->subcategorias_id !== 2 )
                        <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
                    @endif
                @endforeach
            @else    
                <option value="0"> Sin categoria </option>
            @endif
        </select >
    </div>  
    
    <input class='btn btn-success btn-block'  type="submit" value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar'}} ">
    <a class='btn btn-primary btn-block' href="{{ url('/ingresos') }}">Regresar</a>
