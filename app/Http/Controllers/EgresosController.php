<?php

namespace App\Http\Controllers;

use App\Egresos;
use Illuminate\Http\Request; 
use App\ItemsEgresos; 
use App\CategoriasIng; 
use App\Http\Resources\EgresosResource;
use App\Http\Resources\ItemsEgresosResource;

class EgresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        //
        $egresos = Egresos::with('categorias_ings')->get(); 
        $items = ItemsEgresos::with('egresos')->get();  

        return view('egresos.index',['egresos' => json_decode($egresos)],['items' => json_decode($items)]  );   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = CategoriasIng::with('subcategorias')->get();      
        
        $hayCategoria = false; 
        foreach ($categorias as $categoria) {
            if ($categoria->subcategorias_id == 2) {
                $hayCategoria = true;
            }
        }

        if ($hayCategoria) {
            return view('egresos.create',compact('categorias'));
        }else{
            return view('egresos.create');
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
        //
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100', 
            'valor' => 'required|string|max:100', 
            'categorias_ings_id' => 'required|max:100', 
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
            
        try {
            Egresos::create($request->all());
            return redirect('egresos')->with('MensajeError','Egreso agregado correctamente');
        
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('egresos')->with('MensajeError','Primero debe agregar una categoria para egresos.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function show(Egresos $egresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // Traigo los datos del ingreso 
         $egreso = Egresos::findOrFail($id);

         // Traigo los datos de categorias  
         $categorias = CategoriasIng::findOrFail($id)::with('subcategorias')->get();

         // compact -> crea un conjunto de info a traves de una variable
         return view('egresos.edit',compact('egreso','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre' => 'required|string|max:100', 
            'detalle' => 'required|string|max:100', 
            'valor' => 'required|string|max:100', 
            'categorias_ings_id' => 'required|max:100', 
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $egreso = Egresos::findOrFail($id);
        $egreso->update($request->all());  

         return redirect('/egresos')->with('Mensaje','Egreso editado correctamente');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        try {
            $egreso =Egresos::findOrFail($id);
            if ($egreso->delete()) {
                 new EgresosResource($egreso);
            }
            return back()->with('Mensaje','Egreso eliminado correctamente');
        
        }catch (\Illuminate\Database\QueryException $e){
            // Si eliminacion en cascada, traeme a los items para borrarlos tambien
            $items = ItemsEgresos::with('egresos')->get();
            // Los recorro
            foreach ($items as $item){
                // Si coinciden con el egreso que quiero borrar...
                if ($item->egresos->id == $id){
                    // Borro los items de este egreso
                    if ($item->delete()) {
                        new ItemsEgresosResource($items);
                    }
                }
            }
            // Borro el egreso
            if ($egreso->delete()) {
                new EgresosResource($egreso);
            }
            return back()->with('Mensaje','Egreso eliminado correctamente');

           // return redirect('egresos')->with('Mensaje','Operación ínvalida, categoria en uso.');

        }
    }
}
