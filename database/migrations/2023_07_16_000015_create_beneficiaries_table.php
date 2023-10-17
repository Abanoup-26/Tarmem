<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('identity_number');
            $table->string('qualifications');
            $table->string('job_status');
            $table->string('job_title')->nullable();
            $table->string('employer')->nullable();
            $table->decimal('job_salary', 15, 2)->nullable();
            $table->string('marital_status');
            $table->date('marital_state_date')->nullable();
            $table->string('address')->nullable();
            $table->string('illness_status');
            $table->unsignedBigInteger('family_id')->nullable();
            $table->string('apartment')->nullable();
            $table->foreign('family_id')->references('id')->on('beneficiaries');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
