<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class pedidoTableSeeder extends Seeder
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
        for($i=1; $i <= 5; $i++){
            for($p=1; $p <= 5; $p++){
                array_push($data, [
                    'idUsu'         => $i,
                    'idProPues' 	=> $faker->numberBetween(1,20),
                    'idDir'         => $faker->numberBetween(1,3),
                    'idTarjeta'     => $faker->numberBetween(1,2),
                    'cantidad'  	=> $faker->numberBetween(1,3),
                    'peso'          => $faker->randomElement($array = array (1000,500,250,100)),
                    'pagado'        => $faker->boolean,
                    'fecha'         => $faker->$faker->date('Y-m-d')
                ]) ;
            }
        }
        // Insertamos los datos en la base de datos
        DB::table('pedido')->insert($data) ;
    }
}
