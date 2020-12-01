<?php

use App\ItemsEgresos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //\App\Models\Ingresos::factory(20)->create();
        $this->call([
            UserSeeder::class, 
            SubcategoriaSeeder::class, 
            CategoriasSeeder::class, 
            IngresoSeeder::class, 
            EgresoSeeder::class, 
            ItemsEgresosSeeder::class
        ]);
    }
}
