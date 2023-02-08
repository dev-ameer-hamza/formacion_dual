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
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('profesorado_rol',function(Blueprint $table){
            $table->id();
            $table->foreignId('profesorado_id')->constrained('profesorados');
            $table->foreignId('rol_id')->constrained('rols');
            $table->date('start_date')->default(now());
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
        Schema::dropIfExists('profesorado_rol');
        Schema::dropIfExists('rols');
    }
};
