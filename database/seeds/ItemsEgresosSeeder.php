<?php

use Illuminate\Database\Seeder;

class ItemsEgresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\ItemsEgresos::create([
            'nombreitem' => 'Pedales', 
            'cantidaditem' => '2', 
            'egreso_id' => '1', 
        ]);
        App\ItemsEgresos::create([
            'nombreitem' => 'Cubiertas', 
            'cantidaditem' => '2', 
            'egreso_id' => '1', 
        ]);
        App\ItemsEgresos::create([
            'nombreitem' => 'Frenos', 
            'cantidaditem' => '2', 
            'egreso_id' => '1', 
        ]);
    }
}
