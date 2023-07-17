<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBeneficiaryFamiliesTable extends Migration
{
    public function up()
    {
        Schema::table('beneficiary_families', function (Blueprint $table) {
            $table->unsignedBigInteger('illness_type_id')->nullable();
            $table->foreign('illness_type_id', 'illness_type_fk_8757643')->references('id')->on('illnesstypes');
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->foreign('beneficiary_id', 'beneficiary_fk_8757680')->references('id')->on('beneficiaries');
            $table->unsignedBigInteger('familyrelation_id')->nullable();
            $table->foreign('familyrelation_id', 'familyrelation_fk_8758501')->references('id')->on('relatives');
        });
    }
}
