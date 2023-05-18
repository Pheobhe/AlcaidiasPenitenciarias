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
        Schema::create('capacidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destino_id')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->boolean('cap_masculina_active')->default(false);
            $table->boolean('cap_femenina_active')->default(false);
            $table->boolean('cap_trans_active')->default(false);
            $table->integer('cap_masculina')->default(0);
            $table->integer('cap_femenina')->default(0);
            $table->integer('cap_trans')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacidades');
    }
};
