<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemilihsTable extends Migration
{
    public function up()
    {
        Schema::create('memilihs', function (Blueprint $table) {
            $table->unsignedBigInteger('idBook');
            $table->unsignedBigInteger('idProduct');

            $table->foreign('idBook')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['idBook', 'idProduct']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('memilihs');
    }
}
