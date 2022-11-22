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
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->date('inicio');
            $table->date('fin');
            $table->float('precio');
            $table->integer('personas');
            $table->string('estatus');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('correo');
            $table->integer('celular');
            $table->string('nacionalidad');
            $table->date('nacimiento');
            $table->unsignedBigInteger('habitacion')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('habitacion')->references('id')->on('rooms')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacions');
    }
};
