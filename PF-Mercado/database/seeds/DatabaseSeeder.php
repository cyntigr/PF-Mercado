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
        $this->call([
            TipoTableSeeder::class,
            UsersTableSeeder::class,
            PuestoTableSeeder::class,
            ProductoPuestoTableSeeder::class,
            PedidoTableSeeder::class,
            FavoritoTableSeeder::class
        ]);
    }
}
