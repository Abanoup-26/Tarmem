<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingContractorsTable extends Migration
{
    public function up()
    {
        Schema::create('building_contractors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('visit_date');
            $table->string('stages')->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
