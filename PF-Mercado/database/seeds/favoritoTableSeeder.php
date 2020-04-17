<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class favoritoTableSeeder extends Seeder
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
        for($i=0; $i<20; $i++)
			array_push($data, [
                'idPuesto'   => $faker->numberBetween(1,15),
                'idUsu'      => $faker->numberBetween(1,5)
			]) ;

        // Insertamos los datos en la base de datos
        DB::table('favorito')->insert($data) ;
    }
}
