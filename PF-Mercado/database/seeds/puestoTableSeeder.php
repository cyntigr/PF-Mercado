<?php

use Illuminate\Database\Seeder;

class puestoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table->unsignedInteger('idUsu');
        $table->string('foto',255);
        $table->string('telefono',9);
        $table->string('info',300);

        $faker = Faker\Factory::create() ;
            // Create data collection
            $data = [] ;
            for($i=1; $i <= 50; $i++){
                array_push($data, [
                    'idUsu'    => $faker->word(),
                    'foto'     => "puesto.jpg",
                    'telefono' => $faker->numberBetween(600000000, 699999999),
                    'info'     => $faker->text($maxNbChars = 300)          
                ]) ;
            }
            // Insertamos los datos en la base de datos
            DB::table('puesto')->insert($data) ;
    }
}
