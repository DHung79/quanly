<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tendetai');
            $table->string('tomtat');
            $table->text('noidung')->nullable();
            $table->date('thoigianthuchien')->nullable();
            $table->date('thoigianketthuc')->nullable();
            $table->text('huongphattrien')->nullable();
            $table->text('giaiphap')->nullable();
            $table->boolean('daduyet');
            $table->unsignedBigInteger('idgvhd')->nullable();
            $table->foreign('idgvhd')->references('id')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('idtacgia');
            $table->foreign('idtacgia')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('detais');
    }
}
