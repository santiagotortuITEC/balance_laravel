@extends('layouts.app')

@section('content')

<div class="container w-25 text-white bg-secondary p-4">

<!-- Si existe el mensaje, mostralo -->
@if(session('Mensaje'))
    <div class="alert alert-success row mb-2 d-flex justify-content-center " role="alert">
            {{ session('Mensaje') }} 
    </div>
@endif


@if(count($errors)>0)
<div class='alert alert-danger' role='alert'>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('/categoriasing') }}" class='form-horizontal' method="post" enctype="multipart/form-data">
    
    {{ csrf_field() }}

    @include('categoriasing.form',['Modo'=>'crear'])
    

</form>

</div>

@endsection
