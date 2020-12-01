<div class="h5 d-flex justify-content-center font-weight-bold">
    {{ $Modo == 'crear' ? 'AGREGAR CATEGORIA' : 'EDITAR CATEGORIA'}}
</div>

    <div class='form-group'> 
        <label for="Nombre" class='control-label'>{{'Nombre'}}</label>
        <!-- $ingreso->nombre:old('nombre') -> Para que no se pierda lo ingresado desp de un error -->
        <input maxlength="10" type="text" class="form-control {{$errors->has('nombre')?  'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ isset($categoriaIng->nombre) ? $categoriaIng->nombre:old('nombre') }}">
        {!! $errors->first('nombre','<div class="invalid-feedback"> :message </div>') !!}
        
    </div>
    <div class='form-group'> 
        <label for="Detalle" class='control-label'>{{'Detalle'}}</label>
        <input maxlength="25" type="text" name="detalle" class="form-control {{$errors->has('detalle')?  'is-invalid' : '' }}" id="detalle" value="{{ isset($categoriaIng-> detalle) ? $categoriaIng->detalle:old('detalle') }}">
    </div>

 
    
    <div class='form-group'> 
        <label for="Sub categoria" class='control-label'>{{'Sub categoria'}}</label>
        <select  class="form-control " name='subcategorias_id' for="subcategorias_id">

            @foreach ($subcategorias as $subcategoria)
                <option value="{{$subcategoria->id}}"> {{$subcategoria->nombre}} </option>
            @endforeach

        </select >
    </div>
 
   
    <input class='btn btn-success btn-block' type="submit" value="{{ $Modo == 'crear' ? 'Agregar' : 'Editar'}} ">
    <a class='btn btn-primary btn-block' href="{{ url('/categoriasing') }}">Regresar</a>
