<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class direccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds, add rows to the database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create() ;
        // Create data collection
        $data = [] ;
        for($i=1; $i <= 5; $i++){
            for($d=1; $d <= 3; $d++){
                array_push($data, [
                    'calle' 	 => $faker->streetName(),
                    'cp'         => $faker->postcode(),
                    'numero'     => $faker->buildingNumber(),
                    'letra'  	 => $faker->randomLetter(),
                    'municipio'  => $faker->city(),
                    'provincia'  => $faker->country(),
                    'idUsu'      => $i
                ]) ;
            }
        }
        // Insertamos los datos en la base de datos
        DB::table('direccion')->insert($data) ;
    }
}
