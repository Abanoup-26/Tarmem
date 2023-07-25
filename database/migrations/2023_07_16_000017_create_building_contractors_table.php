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
            $table->decimal('quotation_with_materials', 15, 2)->nullable();
            $table->decimal('quotation_without_materials', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
