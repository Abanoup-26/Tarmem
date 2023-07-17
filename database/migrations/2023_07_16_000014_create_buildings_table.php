<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('building_type')->nullable();
            $table->integer('building_number');
            $table->integer('floor_count');
            $table->integer('apartments_count');
            $table->date('birth_data')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtude')->nullable();
            $table->string('management_statuses')->nullable();
            $table->string('rejected_reson')->nullable();
            $table->string('stages')->nullable();
            $table->date('research_vist_date')->nullable();
            $table->date('engineering_vist_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
