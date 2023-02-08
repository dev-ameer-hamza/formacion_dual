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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('seguimiento_alumnos');
        Schema::enableForeignKeyConstraints();


        Schema::create('seguimiento_alumnos',function(Blueprint $table){
            $table->id();
            $table->date('date');
            $table->text('activities');
            $table->text('reflection');
            $table->text('problems');
            $table->foreignId('alumno_id')->constrained('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('seguimiento_alumnos');
        Schema::enableForeignKeyConstraints();


        Schema::create('seguimiento_alumnos', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->string('objective');
            $table->string('decision');
            $table->foreignId('alumno_id')->constrained('alumnos')->onUpdateCascade()->onDeleteCascade();
            $table->foreignId('profesor_id')->constrained('profesorados')->onUpdateCascade()->onDeleteCascade();
            $table->timestamps();
        });
    }
};
