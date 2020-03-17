<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGvhdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gvhd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idsinhvien');
            $table->foreign('idsinhvien')->references('id')->on('sinhvien')->onDelete('cascade');
            $table->unsignedBigInteger('idgiangvien');
            $table->foreign('idgiangvien')->references('id')->on('giangvien')->onDelete('cascade');
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
        Schema::dropIfExists('gvhd');
    }
}
