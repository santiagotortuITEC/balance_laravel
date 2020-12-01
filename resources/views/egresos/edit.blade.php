@extends('layouts.app')

@section('content')

<div class="container w-25 text-white bg-secondary p-4">

<form action="{{ url('/egresos/'. $egreso->id) }}" method="post">

    {{ csrf_field() }}

    <!-- Para acceder directamente al metodo update -->
    {{ method_field('PATCH') }}

    @include('egresos.form',['Modo'=>'editar']) 
</form>



</div>

@endsection