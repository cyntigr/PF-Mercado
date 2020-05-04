<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class ProductoPuestoTableSeeder extends Seeder
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
        for($i=1; $i <= 10; $i++){
            for($p=1; $p <= 15; $p++){
                array_push($data, [
                    'idPuesto'   => $i,
                    'idPro'      => $faker->numberBetween(1,30),
                    'descripcion'=> $faker->text($maxNbChars = 200),
                    'precio'     => $faker->randomFloat($min = 0.50, $max = NULL),
                    'stock'  	 => $faker->boolean,
                ]) ;
            }
        }
        // Insertamos los datos en la base de datos
        DB::table('producto_puesto')->insert($data) ;
    }
}
