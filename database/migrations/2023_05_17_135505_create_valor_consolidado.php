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
        Schema::create('valor_consolidado', function (Blueprint $table) {
            $table->id();
            $table->string('total');
            $table->string('categoria');
            $table->string('cantMasc');
            $table->string('cantFem');
            $table->string('cantTrans');
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
        Schema::dropIfExists('valor_consolidado');
    }
};
