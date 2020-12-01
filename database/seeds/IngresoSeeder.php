<?php

use Illuminate\Database\Seeder;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Ingresos::create([
            'nombre' => 'Colegio', 
            'detalle' => 'Cobre sueldo del colegio', 
            'valor' => '26500', 
            'categorias_ings_id' => '1', 
        ]);
    }
}
