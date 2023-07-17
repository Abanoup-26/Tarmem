<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryFamiliesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiary_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('identity_number');
            $table->string('qualifications')->nullable();
            $table->string('marital_status');
            $table->string('illness_status');
            $table->string('job_status');
            $table->decimal('job_sallary', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
