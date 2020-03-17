<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenlop');
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
        Schema::dropIfExists('lop');
    }
}
