<?php

namespace App\Http\Controllers;

use App\CategoriasIng; 
use App\subcategorias; 
use Illuminate\Http\Request;  
use App\Http\Resources\CategoriasIngResource;

class CategoriasIngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    { 
        $categoriasing = CategoriasIng::with('subcategorias')->get();      

        return view('categoriasing.index',['categoriasing' => $categoriasing] ); 
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = subcategorias::all();      
        return view('categoriasing.create',compact('subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100',  
            'subcategorias_id' => 'required|max:100',  
        ];
        
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        
        CategoriasIng::create($request->all());
        
        return back()->with('Mensaje','Categoria agregada correctamente');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriasIng  $categoriasIng
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasIng $categoriasIng)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriasIng  $categoriasIng
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        // Traigo los datos de categoria       
        $categoriaIng = CategoriasIng::findOrFail($id);

        // Traigo los datos de subcategorias         
        $subcategorias =  subcategorias::all();    
           
        return view('categoriasing.edit',compact('categoriaIng','subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriasIng  $categoriasIng
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100',  
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $categoria = CategoriasIng::findOrFail($id);
        $categoria->update($request->all());  
        
        return redirect('categoriasing')->with('Mensaje','Categoria editada correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriasIng  $categoriasIng
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoria =CategoriasIng::findOrFail($id);
        if ($categoria->delete()) {
            new CategoriasIngResource($categoria);
        }

         return redirect('categoriasing')->with('Mensaje','Categoria eliminada correctamente');
    }
}
