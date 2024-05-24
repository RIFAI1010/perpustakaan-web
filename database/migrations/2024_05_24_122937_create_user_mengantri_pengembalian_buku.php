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
        Schema::create('user_mengantri_pengembalian_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('peminjam_id');
            $table->date('tanggal_deadline_peminjaman');
            $table->date('tanggal_pengembalian_peminjaman');
            $table->enum('status_pengembalian', ['normal', 'rusak', 'hilang']);
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
        Schema::dropIfExists('user_mengantri_pengembalian_buku');
    }
};
