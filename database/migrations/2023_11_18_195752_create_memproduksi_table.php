<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemproduksiTable extends Migration
{
    public function up()
    {
        Schema::create('MEMPRODUKSI', function (Blueprint $table) {
            $table->unsignedBigInteger('idVendor');
            $table->unsignedBigInteger('idProduct');

            $table->foreign('idVendor')->references('id')->on('vendors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['idVendor', 'idProduct']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('MEMPRODUKSI');
    }
}
