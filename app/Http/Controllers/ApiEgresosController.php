<?php

namespace App\Http\Controllers;

use App\Egresos;
use App\Http\Resources\EgresosResource;
use App\Http\Resources\ItemsEgresosResource;
use App\ItemsEgresos;
use Illuminate\Http\Request;



class ApiEgresosController extends Controller
{

    public function index(){
        $egreso = Egresos::with('categorias_ings')->get(); 
        
        return new EgresosResource($egreso);
 
    }

    public function store(Request $request){

        return Egresos::create($request->all());

    }    

    public function show($id)
    { 
        $egreso = Egresos::findOrFail($id);
        return new EgresosResource($egreso);
    }

    
    public function update(Request $request, Egresos $egreso)
    { 
        
        $egreso->update($request->all());  
        return $egreso;
    }
    
    public function destroy($id)
    { 
        $egreso =Egresos::findOrFail($id);
        if ($egreso->delete()) {
            return new EgresosResource($egreso);
        }
        
    }
}
