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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_gerai');
            $table->string('no_invoice');
            $table->string('nama_customer');
            $table->string('jenis_perawatan')->nullable();
            $table->decimal('harga_treatment', 10, 2)->nullable();
            $table->decimal('disc', 10, 2)->nullable();
            $table->string('terapist')->nullable();
            $table->string('pembayaran')->nullable(); // cash, transfer, qris
            $table->decimal('jumlah', 10, 2)->nullable();
            $table->decimal('komisi', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
