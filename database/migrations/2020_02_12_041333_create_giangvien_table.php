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
            $table->string('ho',255);
            $table->string('ten',255);
            $table->tinyInteger('gioitinh');
            $table->date('ngaysinh');
            $table->string('quequan',255);
            $table->string('diachi',255);
            $table->integer('sodt');
            $table->unsignedBigInteger('idusers');
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idkhoa');
            $table->foreign('idkhoa')->references('id')->on('khoa')->onDelete('cascade');
            $table->unsignedBigInteger('idcap');
            $table->foreign('idcap')->references('id')->on('bangcaps')->onDelete('cascade');
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
