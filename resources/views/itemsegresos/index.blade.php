 
@extends('layouts.app')

@section('content')

<div class="container">

<!-- Si existe el mensaje, mostralo -->
@if(Session::has('Mensaje'))
    <div class="alert alert-success row mb-2 d-flex justify-content-center " role="alert">
        {{ Session::get('Mensaje') }}
    </div>
@endif

@if (count($items) < 1)
<div  class="row d-flex justify-content-center ">

    <div class="col-sm-6 " >
      <div class="card mb-2 ">
        <a href="{{ url('/itemsegresos/create') }}" class=" btn btn-primary btn-block ">Agregar item</a>

      
        <div class="card-body text-center">
                No hay items cargados
            </div>
        </div> 
    </div>
</div>
@else
<div class="row mb-2 d-flex justify-content-center">
    <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..." >
    <div class="col-sm-6 ">
        <a href="{{ url('/itemsegresos/create') }}" class=" btn btn-primary btn-block ">Agregar item</a>
    </div>
    
</div>
<table class="table bg-white order-table">

    <thead class="thead-dark">
      <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Egreso al que pertenece</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($items as $item)
            <tr>
                <td>{{$item->nombreitem}}</td>
                <td>{{$item->cantidaditem}}</td>
                <td>{{$item->egresos->nombre}}</td>  
                <td>
                    <a class="btn btn-success btn-sm  "  href="{{ url('/itemsegresos/'.$item->id.'/edit') }}">
                        Editar
                    </a>
                    <form method="post" action="{{ url('/itemsegresos/'.$item->id )}}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-sm " type="submit" onclick="return confirm('Eliminara el item elegido.')">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  
  
  
  
</div>
@endif

@endsection

<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>