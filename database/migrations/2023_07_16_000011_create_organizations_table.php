<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('website');
            $table->string('mobile_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
