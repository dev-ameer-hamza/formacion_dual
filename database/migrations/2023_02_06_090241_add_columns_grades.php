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
        Schema::table("evaluaciones",function(Blueprint $table){
            $table->unsignedInteger('grade_empresa')->after('curso_id');
            $table->unsignedInteger('grade_academic')->after('grade_empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("evaluaciones",function(Blueprint $table){
            $table->dropColumn(['grade_empresa','grade_academic']);
        });
    }
};
