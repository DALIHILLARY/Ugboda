<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rider_Id')->nullable();
            $table->foreign('rider_Id')->references('id')->on('rider');
            $table->string('boda_Id')->nullable();
            $table->foreign('boda_Id')->references('plate')->on('boda_details');
            $table->string('phone_No');
            $table->string('pin');
            $table->enum('active',['YES','NO']);
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
        Schema::dropIfExists('phone');
    }
}
