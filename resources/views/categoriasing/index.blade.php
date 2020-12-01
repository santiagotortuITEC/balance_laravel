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
            <a href="{{ url('/categoriasing/create') }}" class=" btn btn-primary  btn-block">Agregar categoria</a>
    </div>
</div>
 
  
@foreach($categoriasing as $categ)
<!-- El 7 es el "sin categoria"-->
 
<div class="row d-flex justify-content-center">
    <div class="col-sm-6 ">
        <div class="card mb-2 ">
            <div class="text-center card-header inline bg-dark text-white" >
                <h5 class=" ">{{$categ->nombre}}</h5>
               
            </div>
            <div class="card-body">
                <p class="card-text">Detalle: {{$categ->detalle}}</p>   
                @if (isset($categ->subcategorias->nombre))
                    <p class="card-text">Sub Categoria: {{$categ->subcategorias->nombre}}</p>                 
                @else
                    <p class="card-text">Sub Categoria: No tiene</p>              
                @endif         
                <a class="btn btn-success btn-sm btn-block"  href="{{ url('/categoriasing/'.$categ->id.'/edit') }}">
                    Editar
                </a>
                <form method="post" action="{{ url('/categoriasing/'.$categ->id )}}" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm btn-block" type="submit" onclick="return confirm('Eliminara la categoria elegida.')">Borrar</button>
                </form> 
            </div>
        </div>
    </div>
</div>

@endforeach

 


</div>

@endsection
