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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->uuid('nomor_pengiriman')->unique();
            $table->date('tanggal_pengiriman');
            $table->string('lokasi_asal');
            $table->string('lokasi_tujuan');
            $table->enum('status', ['tertunda', 'dalam_perjalanan', 'tiba'])->default('tertunda');
            $table->text('detail_barang')->nullable();
            $table->foreignId('armada_id')->constrained('armadas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
