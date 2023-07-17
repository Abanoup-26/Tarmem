<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingSupportersTable extends Migration
{
    public function up()
    {
        Schema::create('building_supporters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supporter_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
