<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten',255);
            $table->tinyInteger('gioitinh')->nullable();
            $table->string('diachi',255)->nullable();
            $table->integer('sodt')->nullable();
            $table->string('hocvi')->nullable();
            $table->unsignedBigInteger('idusers');
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idkhoa');
            $table->foreign('idkhoa')->references('id')->on('khoa')->onDelete('cascade');
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
        Schema::dropIfExists('giangvien');
    }
}
