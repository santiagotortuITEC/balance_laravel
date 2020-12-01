<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubcategoriasResource;
use App\subcategorias;
use Illuminate\Http\Request;

class ApiSubcategoriasController extends Controller
{
    public function index(){

        $subcategorias = subcategorias::all();         
        return new SubcategoriasResource($subcategorias);

    }
}
