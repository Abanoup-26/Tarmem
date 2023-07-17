<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBuildingSupportersTable extends Migration
{
    public function up()
    {
        Schema::table('building_supporters', function (Blueprint $table) {
            $table->unsignedBigInteger('supporter_id')->nullable();
            $table->foreign('supporter_id', 'supporter_fk_8758525')->references('id')->on('supporters');
            $table->unsignedBigInteger('building_id')->nullable();
            $table->foreign('building_id', 'building_fk_8758526')->references('id')->on('buildings');
        });
    }
}
