<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('MOD_Puesto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 100);
          $table->timestamps();
      });

      Schema::create('MOD_Empleado', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 100);
          $table->string('apellido', 100);
          $table->integer('edad');
          $table->float('salario');
          $table->text('decripcion');

          //Foreign Keys
    			$table->unsignedInteger('puesto_id')->index();
    			$table->foreign('puesto_id')->references('id')->on('MOD_Puesto');
          $table->timestamps();
      });

      Schema::create('MOD_Experiencia_Laboral', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cargo', 100);
          $table->text('decripcion');
          $table->dateTime('fecha_inicio');
          $table->dateTime('fecha_fin');
          $table->unsignedInteger('empleado_id')->index();
          $table->foreign('empleado_id')->references('id')->on('MOD_Empleado');

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
      Schema::drop('MOD_Experiencia_Laboral');
      Schema::drop('MOD_Empleado');
      Schema::drop('MOD_Puesto');
    }
}
