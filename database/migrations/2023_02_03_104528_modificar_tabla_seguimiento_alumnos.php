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
        Schema::table("seguimiento_alumnos",function(Blueprint $table){
            $table->dropColumn(['type','objective','decision']);
            
            if(Schema::hasColumn('seguimiento_alumnos','profesor_id'))
            {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['profesor_id']);
                $table->dropColumn('profesor_id');
                Schema::enableForeignKeyConstraints();
            }
            $table->string('activities');
            $table->string('reflection');
            $table->string('problems');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("seguimiento_alumnos",function(Blueprint $table){
            $table->dropColumn(['activities','reflection','problems']);
            $table->string('type');
            $table->string('objective');
            $table->string('decision');
            $table->foreignId('profesor_id')->constrained('profesorados')->onUpdateCascade()->onDeleteCascade();
            
        });
    }
};
