<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingBuildingManagmentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('building_building_managment', function (Blueprint $table) {
            $table->unsignedBigInteger('building_managment_id');
            $table->foreign('building_managment_id', 'building_managment_id_fk_8957019')->references('id')->on('building_managments')->onDelete('cascade');
            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id', 'building_id_fk_8957019')->references('id')->on('buildings')->onDelete('cascade');
        });
    }
}