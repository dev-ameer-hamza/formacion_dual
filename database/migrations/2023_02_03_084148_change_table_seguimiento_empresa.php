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
        Schema::table('seguimiento_empresas',function(Blueprint $table){
            $table->dropColumn(['date','type','objective','decision']);
            $table->string('observation')->after('tutor_empresa_id');
            $table->unsignedInteger('grade')->after('observation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seguimiento_empresas',function(Blueprint $table){
            $table->date('date');
            $table->string('type');
            $table->string('objective');
            $table->string('decision');
            $table->dropColumn(['observation','grade']);
        });
    }
};
