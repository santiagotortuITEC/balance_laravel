<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingresos;
use App\Egresos;
use App\subcategorias;

class CategoriasIng extends Model
{
    //
    protected $fillable = ['nombre','detalle','subcategorias_id'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    
    public $incrementing = false; 
    public $timestamps = false; 
    
    public function ingresos()
    {
        return $this->hasMany(Ingresos::class);
    }

    public function egresos()
    {
        return $this->hasMany(Egresos::class);
    }

    public function subcategorias()
    {
        return $this->belongsTo(subcategorias::class);   
    }
}
