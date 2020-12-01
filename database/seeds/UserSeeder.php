<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
 
        App\User::create([
            'name' => 'Santiago Tortu',
            'email' => 's.tortu@itecriocuarto.org.ar',
            'password' => bcrypt('42400448'), 
        ]);
        App\User::create([
            'name' => 'Santiago Palacios',
            'email' => 's.palacios@itecriocuarto.org',
            'password' => bcrypt('123456'), 
        ]);
    }
}
