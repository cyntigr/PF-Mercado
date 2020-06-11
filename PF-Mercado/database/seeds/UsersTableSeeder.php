<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('es_ES');
        // Create data collection
        $data = [] ;
        array_push($data, [
            'nombre' 	         => $faker->name(),
            'apellido'           => $faker->lastName(),
            'dni'                => '74740147Z',
            'email'              => 'cyntigr@gmail.com',
            'password'           => Hash::make('12345cya'),
            'telefono'           => '661121633',
            'fecNac'             => $faker->date(),
            'idTipo'             => '1',
            'vendedor'           => false,
            'direccion'          => $faker->address(),
            'tarjeta'            => null,
            'caducidad'          => null,
            'cvc'                => null,
            'foto'               => 'user.jpg',
            'nif'                => null,
        ]) ;
        for($i=1; $i <= 5; $i++){
                $numero = $faker->randomNumber($nbDigits = 8, $strict = true) 
                . $faker->randomNumber($nbDigits = 8, $strict = true);
                $dni = $faker->numberBetween(10000000, 99999999).$faker->randomLetter ();
                $nif = $faker->numberBetween(10000000, 99999999).$faker->randomLetter ();
                array_push($data, [
                    'nombre' 	         => $faker->name(),
                    'apellido'           => $faker->lastName(),
                    'dni'                => $dni,
                    'email'              => $faker->freeEmail(),
                    'password'           => Hash::make('12345cya'),
                    'telefono'           => $faker->numberBetween(600000000, 699999999),
                    'fecNac'             => $faker->date(),
                    'idTipo'             => '3',
                    'vendedor'           => $faker->boolean(),
                    'direccion'          => $faker->address(),
                    'tarjeta'            => $numero,
                    'caducidad'          => '05/2021',
                    'cvc'                => $faker->numberBetween(100, 999),
                    'foto'               => 'user.jpg',
                    'nif'                => $nif,
                ]) ;
        }
        // Insertamos los datos en la base de datos
        DB::table('user')->insert($data) ;
    }
}