<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->boolean('status')->default(false);
            $table->string('metode');

            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
