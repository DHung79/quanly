<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyinteger('cosolythuyet');
            $table->tinyinteger('ptthietkehethong');
            $table->tinyinteger('ketquadatduoc');
            $table->float('phantramhoanthanh',100,2);
            $table->unsignedBigInteger('iddetai')->nullable();
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
        Schema::dropIfExists('tiendo');
    }
}
