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
        Schema::create('alumno_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('registration_year');
            $table->foreignId('alumno_id')->constrained('alumnos')->onUpdateCascade()->onDeleteCascade();
            $table->foreignId('curso_id')->constrained('cursos')->onUpdateCascade()->onDeleteCascade();
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
        Schema::dropIfExists('alumno_cursos');
    }
};
