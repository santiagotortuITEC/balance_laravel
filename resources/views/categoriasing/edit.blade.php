@extends('layouts.app')

@section('content')

<div class="container w-25 text-white bg-secondary p-4">

<form action="{{ url('/categoriasing/'. $categoriaIng->id) }}" method="post">

    {{ csrf_field() }}

    <!-- Para acceder directamente al metodo update -->
    {{ method_field('PATCH') }}

    @include('categoriasing.form',['Modo'=>'editar']) 
</form>



</div>

@endsection