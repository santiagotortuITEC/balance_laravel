@extends('layouts.app')

@section('content')

<div class="container w-25 text-white bg-secondary p-4">

<form action="{{ url('/itemsegresos/'. $item->id) }}" method="post">

    {{ csrf_field() }}
    
    <!-- Para acceder directamente al metodo update -->
    {{ method_field('PATCH') }}

    @include('itemsegresos.form',['Modo'=>'editar']) 
    
</form>



</div>

@endsection