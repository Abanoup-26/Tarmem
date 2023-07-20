<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractorsTable extends Migration
{
    public function up()
    {
        Schema::table('contractors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8757476')->references('id')->on('users');
            $table->unsignedBigInteger('contractor_type_id')->nullable();
            $table->foreign('contractor_type_id', 'contractor_type_fk_8771758')->references('id')->on('contractor_types');
        });
    }
}
