<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoriasIng;

class subcategorias extends Model
{
    //
    public function categoriasIng()
    {
        return $this->hasMany(CategoriasIng::class);
    }
}
