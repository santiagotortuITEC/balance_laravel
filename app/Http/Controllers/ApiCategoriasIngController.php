<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasIng; 
use App\Http\Resources\CategoriasIngResource;

class ApiCategoriasIngController extends Controller
{
    public function index(){

        $categoriasing = CategoriasIng::with('subcategorias')->get();      
        return new CategoriasIngResource($categoriasing);

    }

    public function store(Request $request){ 
        return CategoriasIng::create($request->all());
    }    

    public function show($id)
    {
        //
        $categoriasing = CategoriasIng::findOrFail($id);
        return new CategoriasIngResource($categoriasing);
    }

    public function update(Request $request, CategoriasIng $categoria)
    {
       
        $categoria->update($request->all());  
        return $categoria;
    }

    public function destroy($id)
    { 
        $categoria =CategoriasIng::findOrFail($id);
        if ($categoria->delete()) {
            return new CategoriasIngResource($categoria);
        }
        
    }
}
