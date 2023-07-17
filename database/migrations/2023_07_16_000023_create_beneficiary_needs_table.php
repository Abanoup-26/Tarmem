<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryNeedsTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiary_needs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('trmem_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
