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
        Schema::create('laporan_transaksi_peminjaman_buku', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->references('id')->on('users');
            $table->foreignUuid('id_buku')->references('id')->on('bukus');
            $table->date('reserve_date');
            $table->date('due_date');
            $table->date('return_date');
            $table->enum('status_pengembalian', ['normal', 'rusak', 'hilang']);
            $table->unsignedInteger('denda')->nullable();
            $table->string('foto_pengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_transaksi_peminjaman_buku');
    }
};
