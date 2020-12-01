<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Resources\IngresosResource;
use App\Ingresos;   

class ApiIngresosController extends Controller
{
    //
    public function index(){
        $ingreso = Ingresos::with('categorias_ings')->get();          
        return new IngresosResource($ingreso);

    }

    public function store(Request $request){

        return Ingresos::create($request->all());
    }    

    public function show($id)
    { 
        $ingreso = Ingresos::findOrFail($id);
        return new IngresosResource($ingreso);
    }

    
    public function update(Request $request, Ingresos  $ingreso)
    { 
        
        $ingreso->update($request->all());  
        return $ingreso;
    }
    
    public function destroy($id)
    { 
        $ingreso =Ingresos::findOrFail($id);
        if ($ingreso->delete()) {
            return new IngresosResource($ingreso);
        }
        
        
    }
}
