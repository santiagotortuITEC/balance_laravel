<?php

namespace App\Http\Controllers;
 
use App\ItemsEgresos; 
use Illuminate\Http\Request; 
use App\Egresos;
use App\Http\Resources\ItemsEgresosResource;


class ItemsEgresosController extends Controller
{
 


    public function index()
    {  
        $items = ItemsEgresos::with('egresos')->get();
           
        return view('itemsegresos.index',['items' => $items]);   
    
    }

    public function create()
    { 
        $egresos = Egresos::with('categorias_ings')->get(); 
        return view('itemsegresos.create',compact('egresos'));
        
    }

    public function store(Request $request)
    {  
 

        // Validacion
        $campos = [
            'nombreitem' => 'required|string|max:100', 
            'cantidaditem' => 'required|max:100', 
            'egreso_id' => 'required|max:100', 
        ];
        //$Mensaje = ["required"=>'El :attribute es requerido'];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        // Enviar datos  
        ItemsEgresos::create($request->all());
        
        // Retornar vista
        return back()->with('Mensaje','Item agregado correctamente'); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemsEgresos  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        // Traigo los datos del items 
        $item = ItemsEgresos::findOrFail($id);
 
        // Traigo los datos de egresos  
        $egresos = Egresos::with('categorias_ings')->get();

        // compact -> crea un conjunto de info a traves de una variable
        return view('itemsegresos.edit',compact('item','egresos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ItemsEgresos  $item
     * @param  \App\ItemsEgresos  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $campos = [
            'nombreitem' => 'required|string|max:100', 
            'cantidaditem' => 'required|max:100',   
        ]; 

        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
         
        $item = ItemsEgresos::findOrFail($id);
        $item->update($request->all()); 

        return redirect('egresos')->with('Mensaje','Item editado correctamente'); 
    }

    public function destroy($id)
    {  
        $items =ItemsEgresos::findOrFail($id);
        if ($items->delete()) {
            new ItemsEgresosResource($items);
        }
        return back()->with('Mensaje','Item eliminado correctamente');
    }





}
