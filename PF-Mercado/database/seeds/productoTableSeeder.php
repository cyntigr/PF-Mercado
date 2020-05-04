<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker\Factory::create() ;
            // Create data collection
            $data = [] ;
            for($i=1; $i <= 50; $i++){
                array_push($data, [
                    'nombre'   => $faker->word(),
                    'foto'     => "ejemplo.jpg"
                ]) ;
            }
            // Insertamos los datos en la base de datos
            DB::table('producto')->insert($data) ;
    }
}
