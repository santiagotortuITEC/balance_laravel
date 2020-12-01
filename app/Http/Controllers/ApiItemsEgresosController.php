<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Resources\ItemsEgresosResource;
use App\ItemsEgresos;

class ApiItemsEgresosController extends Controller
{
    public function index(){

        $items = ItemsEgresos::with('egresos')->get();          
        return new ItemsEgresosResource($items);

    }

    public function store(Request $request){ 
        return ItemsEgresos::create($request->all());
    }    

    public function show($id)
    {
        $item = ItemsEgresos::findOrFail($id);
        return new ItemsEgresosResource($item);
 
    }
    public function update(Request $request, ItemsEgresos $itemsegreso)
    {
        $itemsegreso->update($request->all());  
        return $itemsegreso;
     
    }

    public function destroy($id)
    { 
        $items =ItemsEgresos::findOrFail($id);
        if ($items->delete()) {
            return new ItemsEgresosResource($items);
        }
        
      
    }
}
