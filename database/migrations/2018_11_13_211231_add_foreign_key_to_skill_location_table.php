<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToSkillLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill_location', function (Blueprint $table) {
            $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_location', function (Blueprint $table) {
            $table->dropForeign('skill_location_skill_id_foreign');
            $table->dropForeign('skill_location_location_id_foreign');
        });
    }
}
