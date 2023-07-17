<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBuildingContractorsTable extends Migration
{
    public function up()
    {
        Schema::table('building_contractors', function (Blueprint $table) {
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->foreign('contractor_id', 'contractor_fk_8758357')->references('id')->on('contractors');
            $table->unsignedBigInteger('building_id')->nullable();
            $table->foreign('building_id', 'building_fk_8758358')->references('id')->on('buildings');
        });
    }
}
