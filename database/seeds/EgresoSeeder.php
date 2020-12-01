<?php

use Illuminate\Database\Seeder;

class EgresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Egresos::create([
            'nombre' => 'Bicicleta', 
            'detalle' => 'Restaure mi bicicleta', 
            'valor' => '11000', 
            'categorias_ings_id' => '2', 
        ]);
    }
}
