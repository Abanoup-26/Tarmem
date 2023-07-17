<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_type_id')->nullable();
            $table->foreign('organization_type_id', 'organization_type_fk_8747229')->references('id')->on('organization_types');
        });
    }
}
