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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->date('tanggal_memulai_peminjaman');
            $table->date('tanggal_deadline_peminjaman');
            $table->date('tanggal_dikembalikan');
            $table->enum('status_pengembalian', ['normal', 'rusak', 'hilang']);
            $table->unsignedInteger('denda')->nullable();
            $table->string('foto_pengembalian')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
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
