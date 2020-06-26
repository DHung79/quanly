<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('iddetai');
            $table->foreign('iddetai')->references('id')->on('detais')->onDelete('cascade');
            $table->unsignedBigInteger('idgv')->nullable();
            $table->foreign('idgv')->references('id')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('idsv')->nullable();
            $table->foreign('idsv')->references('id')->on('sinhvien')->onDelete('cascade');
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
        Schema::dropIfExists('thanhvien');
    }
}
