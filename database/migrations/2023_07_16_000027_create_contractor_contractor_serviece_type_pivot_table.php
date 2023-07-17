<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorContractorServieceTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('contractor_contractor_serviece_type', function (Blueprint $table) {
            $table->unsignedBigInteger('contractor_id');
            $table->foreign('contractor_id', 'contractor_id_fk_8757603')->references('id')->on('contractors')->onDelete('cascade');
            $table->unsignedBigInteger('contractor_serviece_type_id');
            $table->foreign('contractor_serviece_type_id', 'contractor_serviece_type_id_fk_8757603')->references('id')->on('contractor_serviece_types')->onDelete('cascade');
        });
    }
}
