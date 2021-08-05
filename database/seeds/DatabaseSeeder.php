<?php

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
        $this->call(OficiosSeeder::class);
        //$this->call(DepartamentoSeeder::class);
        $this->call(anuncioSeeder::class);
        $this->call(UserSeeder::class);
    }
}
