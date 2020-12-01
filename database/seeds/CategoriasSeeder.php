<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CategoriasIng::create([
            'nombre' => 'Sueldos', 
            'detalle' => 'Ingresos por sueldo', 
            'subcategorias_id' => '1',  
        ]);

        App\CategoriasIng::create([
            'nombre' => 'Deportes', 
            'detalle' => 'Gastos en entrenamientos', 
            'subcategorias_id' => '2',  
        ]);
    }
}
