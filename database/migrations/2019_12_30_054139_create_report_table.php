<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rider_Id');
            $table->foreign('rider_Id')->references('id')->on('rider');
            $table->string('plate_id');
            $table->foreign('plate_id')->references('plate')->on('boda_details');
            $table->string('phone');
            $table->enum('catergory',['THEFT','MURDER','OTHERS','RAPE','NULL'])->default('NULL');
            $table->enum('progress',['ACTIVE','SOLVED','NULL'])->default('NULL');
            $table->string('location');
            $table->softDeletes('deleted_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
