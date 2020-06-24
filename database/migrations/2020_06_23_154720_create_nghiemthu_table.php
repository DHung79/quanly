<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNghiemthuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nghiemthu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyinteger('diemdanhgia');
            $table->text('nhanxetchung');
            $table->unsignedBigInteger('iddetai');
            $table->foreign('iddetai')->references('id')->on('detais')->onDelete('cascade');
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
        Schema::dropIfExists('nghiemthu');
    }
}
