@extends('layouts.app')

@section('content')

<div class="container">

<!-- Si existe el mensaje, mostralo -->
@if(Session::has('Mensaje'))
    <div class="alert alert-success row mb-2 d-flex justify-content-center " role="alert">
        {{ Session::get('Mensaje') }}
    </div>
@endif
@if(Session::has('MensajeError'))
    <div class="alert alert-danger row mb-2 d-flex justify-content-center " role="alert">
        {{ Session::get('MensajeError') }}
    </div>
@endif

<div class="row mb-2 d-flex justify-content-center">
    <div class="col-sm-6 ">
       <a href="{{ url('/egresos/create') }}" class=" btn btn-primary btn-block">Agregar egreso</a>
    </div>
</div>
 
@if (count($egresos) < 1)
<div  class="row d-flex justify-content-center ">
    <div class="col-sm-6 " >
        <div class="card mb-2 ">
            <div class="card-body text-center">
                 No hay egresos cargados
            </div>
        </div> 
    </div>
</div>
@endif

@foreach($egresos as $egreso)

<div class="row d-flex justify-content-center">
    <div class="col-sm-6 ">
        <div class="card mb-2 ">
            <div class="text-center card-header inline bg-dark text-white" >
                <h5 class=" ">{{$egreso->nombre}}</h5>
               
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p class="card-text">Detalle: {{$egreso->detalle}}</p>
                    <p class="card-text">Valor ${{$egreso->valor}}</p>
                    @if (isset($egreso->categorias_ings->nombre))
                        <p class="card-text">Categoria: {{$egreso->categorias_ings->nombre}}</p>         
                    @elseif ($egreso->categorias_ings_id == 0)       
                        <p class="card-text">Sin categoria</p>                
                    @else
                        <p class="card-text">Categoria: No asignada</p>                
                    @endif
                </div>
                <div class="col-sm-6 ">
                    <div class="mt-n4 " >
                        <strong>ITEMS</strong>  
                        <a class="btn btn-primary btn-sm btn-block"  href="{{ url('itemsegresos/create') }}">
                            Agregar item
                        </a>
                        @foreach($items as $item) <br>
                            @if($item->egreso_id == $egreso->id)
                                <a  href="{{ url('/itemsegresos/'.$item->id.'/edit') }}">{{ $item->nombreitem }}: {{ $item->cantidaditem }} unidades</a> <br>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

 
                <a class="btn btn-success btn-sm btn-block"  href="{{ url('/egresos/'.$egreso->id.'/edit') }}">
                    Editar
                </a>
                <form method="post" action="{{ url('/egresos/'.$egreso->id )}}" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm btn-block" type="submit" onclick="return confirm('Eliminara el egreso elegido.')">Borrar</button>
                </form>
                 
            </div>
        </div>
    </div>

</div>
@endforeach

 


</div>

@endsection
