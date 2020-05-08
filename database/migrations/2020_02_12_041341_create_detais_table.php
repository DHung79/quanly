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
            $table->tinyinteger('tiendo');
            $table->boolean('thamkhao');
            $table->boolean('daduyet');
            $table->unsignedBigInteger('idgvhd')->nullable();
            $table->foreign('idgvhd')->references('id')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('idsinhvien');
            $table->foreign('idsinhvien')->references('id')->on('sinhvien')->onDelete('cascade');
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
