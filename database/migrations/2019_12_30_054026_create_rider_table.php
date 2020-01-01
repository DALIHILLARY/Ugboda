<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->enum('gender',['F','M']);
            $table->string('NIN');
            $table->string('Next of Kin');
            $table->unsignedBigInteger('District_Id');
            $table->foreign('District_Id')->references('id')->on('districts');
            $table->string('plate_id');
            $table->foreign('plate_id')->references('plate')->on('boda_details');
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
        Schema::dropIfExists('rider');
    }
}
