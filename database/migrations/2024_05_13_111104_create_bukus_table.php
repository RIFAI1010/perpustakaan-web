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
            $table->uuid('id')->primary();
            $table->string('image');
            $table->string('title');
            $table->longText('deskripsi');
            $table->string('isbn', 10);
            $table->unsignedSmallInteger('page_count');
            $table->enum('language', ['Indonesia', 'Inggris']);
            $table->unsignedDecimal('average_rating', 1, 1);
            $table->unsignedInteger('ratings_count');
            $table->date('published_date');
            $table->enum('tipe', ['E-Book', 'Buku Cetak']);
            $table->boolean('status_ketersediaan');
            $table->boolean('status_approval')->nullable();

            $table->foreignUuid('id_penerbit')->references('id')->on('penerbits');
            $table->foreignUuid('id_peminjam')->nullable()->references('id')->on('users');

            $table->date('reserve_date')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
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
