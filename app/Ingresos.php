<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoriasIng;

class Ingresos extends Model
{
    //  
    protected $table = "ingresos";
    protected $primaykey = "id";
    protected $fillable = ['nombre','valor','detalle','categorias_ings_id'];
    protected $guarded = [];
    public function categorias_ings()
    {
        return $this->belongsTo(CategoriasIng::class);
    }

}
