<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class PuestoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('es_ES') ;
            // Create data collection
            $data = [] ;
            for($i=1; $i <= 15; $i++){
                array_push($data, [
                    'idUsu'    => $faker->numberBetween(1, 5),
                    'nombre'   => $faker->company(),
                    'foto'     => "puesto.jpg",
                    'telefono' => $faker->numberBetween(600000000, 699999999),
                    'info'     => $faker->text($maxNbChars = 300)          
                ]) ;
            }
            // Insertamos los datos en la base de datos
            DB::table('puesto')->insert($data) ;
    }
}
