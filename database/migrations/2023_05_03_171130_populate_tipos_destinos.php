<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tipo_destinos')->insert(
            array(
                
                'nombre' => "alcaidiaPenitenciaria",
                'tieneDepartamento' => false,
                'tieneComplejo'     => true
            )
        );
        DB::table('tipo_destinos')->insert(
            array(
                
                'nombre' => "unidadPenitenciaria",
                'tieneDepartamento' => false,
                'tieneComplejo'     => true
            )
        );
        DB::table('tipo_destinos')->insert(
            array(
                
                'nombre' => "alcaidiaDepartamental",
                'tieneDepartamento' => true,
                'tieneComplejo'     => false
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
