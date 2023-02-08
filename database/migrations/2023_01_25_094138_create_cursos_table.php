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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grado_id')->constrained('grados')->onUpdateCascade()->onDeleteCascade();
            $table->string('name')->unique();
            $table->unsignedInteger('nivel');
            $table->timestamps();
        });

        Schema::create('alumno_curso',function(Blueprint $table){
            $table->id();
            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->foreignId('curso_id')->constrained('cursos')->onUpdateCascade()->onDeleteCascade();
            $table->date('start_date');
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_curso');
        Schema::dropIfExists('cursos');
    }
};
