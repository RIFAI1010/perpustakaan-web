<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('isbn', 10);
            $table->unsignedSmallInteger('jumlah_halaman');
            $table->enum('bahasa', ['Indonesia', 'Inggris']);
            $table->unsignedDecimal('rata_rata_rating', 1, 1)->nullable();
            $table->unsignedInteger('jumlah_perating')->default(0);
            $table->date('tanggal_terbit');
            $table->enum('tipe', ['E-Book', 'Buku Cetak']);
            $table->boolean('status_ketersediaan');
            $table->unsignedBigInteger('penerbit_id');
            $table->unsignedBigInteger('peminjam_id')->nullable();
            $table->date('tanggal_deadline_peminjaman')->nullable();
            $table->timestamps();

            $table->foreign('penerbit_id')->references('id')->on('penerbits')->onDelete('cascade');
            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
