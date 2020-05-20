<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class PedidoTableSeeder extends Seeder
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
        for($i=1; $i <= 5; $i++){
            for($p=1; $p <= 5; $p++){
                array_push($data, [
                    'idUsu'         => $i,
                    'idProPues' 	=> $faker->numberBetween(1,20),
                    'cantidad'  	=> $faker->numberBetween(1,3),
                    'peso'          => $faker->randomElement($array = array (1000,500,250,100)),
                    'pagado'        => $faker->boolean,
                    'fecha'         => $faker->date('Y-m-d')
                ]) ;
            }
        }
        // Insertamos los datos en la base de datos
        DB::table('pedido')->insert($data) ;
    }
}
