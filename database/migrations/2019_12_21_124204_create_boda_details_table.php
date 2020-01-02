<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boda_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('NIN');
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
        Schema::dropIfExists('boda_details');
    }
}
