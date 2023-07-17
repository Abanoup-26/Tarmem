<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->unsignedBigInteger('illness_type_id')->nullable();
            $table->foreign('illness_type_id', 'illness_type_fk_8757619')->references('id')->on('illnesstypes');
            $table->unsignedBigInteger('building_id')->nullable();
            $table->foreign('building_id', 'building_fk_8758431')->references('id')->on('buildings');
        });
    }
}
