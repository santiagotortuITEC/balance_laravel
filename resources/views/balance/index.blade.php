

@extends('layouts.app')

@section('content')
<div class="row justify-content-center text-center mb-4">
    <div class="col-4">
            <h2 class="font-weight-bold border border-dark bg-dark text-white">Ingresos: ${{ $totalIngreso  }}</h2>
            <div class=" mt-4 bg-secondary">
                @foreach ($ingresos as $ingreso)
                <div class="row ">
                    <div class="col-sm-4">
                        <p class=" p-2  border-bottom border-dark font-weight-bold text-white">{{$ingreso->nombre}} </p>
                    </div>   
                    <div class="col-sm-4 ">
                        <div class=" p-2 border-bottom border-dark font-weight-bold text-white">  
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </div>

                    </div>  
                    <div class="col-sm-4 ">
                        <p class=" p-2 border-bottom border-dark font-weight-bold text-white">${{$ingreso->valor}} </p>
                    </div>
                </div>
                @endforeach
            </div>

    </div>
    <div class="col-4">
    <h2 class="font-weight-bold  border border-dark   bg-dark text-white"> Egresos: ${{ $totalEgreso }} </h2>
            <div class=" mt-4  bg-secondary ">
                @foreach ($egresos as $egreso)
                <div class="row ">
                    <div class="col-sm-4">
                        <p class=" p-2  border-bottom border-dark font-weight-bold text-white ">{{$egreso->nombre}} </p>
                    </div>   
                    <div class="col-sm-4 ">
                        <div class=" p-2 border-bottom border-dark font-weight-bold text-white">  
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </div>

                    </div>  
                    <div class="col-sm-4">
                        <p class=" p-2 border-bottom border-dark font-weight-bold text-white">${{$egreso->valor}} </p>
                    </div>
                </div>
                @endforeach
            </div>
</div>



</div>

<div class='container'>

    @if( ($totalIngreso-$totalEgreso) > 0 )
    <h1 class="mt-2 bg-dark font-bold text-success text-center ">Tu balance: ${{ $totalIngreso - $totalEgreso  }}</h1>
    @elseif( ($totalIngreso-$totalEgreso) < 0 )
    <h1 class="mt-2  bg-dark font-bold  text-danger text-center">Tu balance: ${{ $totalIngreso - $totalEgreso  }}</h1>
    @else
    <h1 class="mt-2 bg-dark font-bold text-warning text-center">Tu balance: ${{ $totalIngreso - $totalEgreso  }}</h1>
    @endif
</div> 

@endsection







