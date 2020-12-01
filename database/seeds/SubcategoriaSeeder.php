<?php

use Illuminate\Database\Seeder;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\subcategorias::create([
            'nombre' => 'Ingreso', 
        ]);
        App\subcategorias::create([
            'nombre' => 'Egreso', 
        ]);
    }
}
