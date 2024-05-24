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
        Schema::create('laporan_peminjaman_buku_berlangsung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('peminjam_id');
            $table->date('tanggal_pengajuan_peminjaman');
            $table->date('tanggal_peminjaman_disetujui');
            $table->date('tanggal_deadline_peminjaman');
            $table->date('tanggal_pengembalian_peminjaman')->nullable();
            $table->enum('status_pengembalian', ['normal', 'rusak', 'hilang'])->nullable();
            $table->unsignedInteger('denda')->default(0)->nullable();
            $table->boolean('status_pembayaran_denda')->nullable();
            $table->string('foto_buku_dikembalikan')->nullable();

            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_peminjaman_buku_berlangsung');
    }
};
