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
        Schema::create('grado_profesores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grado_id')->constrained('grados')->onUpdateCascade()->onDeleteCascade();
            $table->foreignId('profesor_id')->constrained('profesorados')->onUpdateCascade()->onDeleteCascade();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('grado_profesores');
        Schema::enableForeignKeyConstraints();
    }
};
