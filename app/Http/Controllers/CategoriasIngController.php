<?php

namespace App\Http\Controllers;

use App\CategoriasIng; 
use App\subcategorias; 
use Illuminate\Http\Request;  
use App\Http\Resources\CategoriasIngResource;
use App\Egresos;
use App\Ingresos;


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
        $update = true; 
        $egresos = Egresos::with('categorias_ings')->get(); 
        foreach ($egresos as $egreso){
            if ($egreso->categorias_ings->id == $id){
                $update = false;
            }
        }
        $ingresos = Ingresos::with('categorias_ings')->get(); 
        foreach ($ingresos as $ingreso){
            if ($ingreso->categorias_ings->id == $id){
                $update = false;
            }
        }
        //
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100',  
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        if ($update){
            $categoria = CategoriasIng::findOrFail($id);
            $categoria->update($request->all());  
            return redirect('categoriasing')->with('Mensaje','Categoria editada correctamente');
        }else{
            return redirect('categoriasing')->with('Mensaje','Categoria NO editada');
        }
        
        
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
        try {
            $categoria =CategoriasIng::findOrFail($id);
            if ($categoria->delete()) {
                new CategoriasIngResource($categoria);
            }
             return redirect('categoriasing')->with('Mensaje','Categoria eliminada correctamente');
        
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('categoriasing')->with('MensajeError','Operación ínvalida, categoria en uso.');

        }
        
    }
}
