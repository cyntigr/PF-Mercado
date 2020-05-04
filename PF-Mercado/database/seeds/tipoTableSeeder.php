<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [] ;
        array_push($data, [
            'nombre' 	         => 'administrador',
        ]);
        array_push($data, [
            'nombre' 	         => 'vendedor',
        ]);
        array_push($data, [
            'nombre' 	         => 'cliente',
        ]);

        DB::table('tipo')->insert($data) ;
    }
}
