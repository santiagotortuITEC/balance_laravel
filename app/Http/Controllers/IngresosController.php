<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request; 
use App\Ingresos;
use App\Http\Resources\IngresosResource;
use App\CategoriasIng; 

class IngresosController extends Controller
{
  

    public function index()
    {  
        $ingreso = Ingresos::with('categorias_ings')->get();          
        new IngresosResource($ingreso);    
        return view('ingresos.index',[ 'ingresos' => $ingreso]);   
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    { 
        $categorias = CategoriasIng::with('subcategorias')->get();      
        //die();
        $hayCategoria = false; 
        foreach ($categorias  as $categoria) {
            if ($categoria->subcategorias_id == 1) {
                $hayCategoria = true;
            }
        }

        if ($hayCategoria) {
            return view('ingresos.create',compact('categorias'));
        }else{
            return view('ingresos.create');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
    public function store(Request $request)
    {  
 
        // Validacion
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100', 
            'valor' => 'required|string|max:100', 
            'categorias_ings_id' => 'required|max:100', 
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        Ingresos::create($request->all());
        
        // Retornar vista
        return back()->with('Mensaje','Ingreso agregado correctamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
  

    public function show($id)
    {
        // Desde la vista no hago uso de esta funcion nunca. 
        // Seria para mostrar un solo registro, desde la API esta disponible en api_show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
 
    public function edit($id)
    { 
        // Traigo los datos del ingreso 
        $ingreso = Ingresos::findOrFail($id);
        // Traigo los datos de categorias  
        $categorias = CategoriasIng::findOrFail($id)::with('subcategorias')->get();

        // compact -> crea un conjunto de info a traves de una variable
        return view('ingresos.edit',compact('ingreso','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, $id)
    {  
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100', 
            'valor' => 'required|string|max:100', 
            'categorias_ings_id' => 'required|max:100', 
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        $ingreso = Ingresos::findOrFail($id);
        $ingreso->update($request->all());  
        
        return redirect('/ingresos')->with('Mensaje','Ingreso editado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */

  

    public function destroy($id)
    { 
        $ingreso =Ingresos::findOrFail($id);
        if ($ingreso->delete()) {
            new IngresosResource($ingreso);
        }
        
        return back()->with('Mensaje','Ingreso eliminado correctamente');
    }



}
