<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ho',255)->nullable();
            $table->string('ten',255)->nullable();
            $table->tinyInteger('gioitinh')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('quequan',255)->nullable();
            $table->string('diachi',255)->nullable();
            $table->integer('sodt')->nullable();
            $table->unsignedBigInteger('idusers');
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idlop');
            $table->foreign('idlop')->references('id')->on('lop')->onDelete('cascade');
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
        Schema::dropIfExists('sinhviens');
    }
}
