<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Egresos;


class ItemsEgresos extends Model
{
    //
    //protected $table = "items_egresos";
    protected $fillable = ['nombreitem','cantidaditem','egreso_id'];
    protected $guarded = [];
    protected $primaryKey = 'id'; 
    
    public $incrementing = false; 
    public $timestamps = false; 



    public function egresos()
    {
        return $this->belongsTo(Egresos::class, 'egreso_id');   
    }
}
