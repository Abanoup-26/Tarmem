<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingManagmentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('building_managment_user', function (Blueprint $table) {
            $table->unsignedBigInteger('building_managment_id');
            $table->foreign('building_managment_id', 'building_managment_id_fk_8957020')->references('id')->on('building_managments')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8957020')->references('id')->on('users')->onDelete('cascade');
        });
    }
}