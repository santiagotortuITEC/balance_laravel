 
@extends('layouts.app')

@section('content')

<div class="container">

<!-- Si existe el mensaje, mostralo -->
@if(Session::has('Mensaje'))
    <div class="alert alert-success row mb-2 d-flex justify-content-center " role="alert">
        {{ Session::get('Mensaje') }}
    </div>
@endif

<div class="row mb-2 d-flex justify-content-center">
    <div class="col-sm-6 ">
   
        <a href="{{ url('/ingresos/create') }}" class=" btn btn-primary btn-block ">  Agregar ingreso</a>
    </div>
</div>
 
 
 
@foreach($ingresos as $ingreso)

<div  class="row d-flex justify-content-center ">
    <div class="col-sm-6 " >
        <div class="card mb-2 ">
            <div class="text-center card-header inline bg-dark text-white" >
                <h5 class=" ">{{$ingreso->nombre}}</h5>

            </div>
            <div class="card-body">
                <p class="card-text">Detalle: {{$ingreso->detalle}}</p>
                <p class="card-text">Valor ${{$ingreso->valor}}</p>
                @if (isset($ingreso->categorias_ings->nombre))
                    <p class="card-text">Categoria: {{$ingreso->categorias_ings->nombre}}</p>         
                @elseif ($ingreso->categorias_ings_id == 0)       
                    <p class="card-text">Sin categoria</p>                
                @else
                    <p class="card-text">Categoria: No asignada</p>                
                @endif
                <a class="btn btn-success btn-sm btn-block"  href="{{ url('/ingresos/'.$ingreso->id.'/edit') }}">
                    Editar
                </a>
                <form method="post" action="{{ url('/ingresos/'.$ingreso->id )}}" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm btn-block" type="submit" onclick="return confirm('Eliminara el ingreso elegido.')">Borrar</button>
                </form> 
            </div>
        </div> 
    </div>
</div>
@endforeach

 


</div>

@endsection
 