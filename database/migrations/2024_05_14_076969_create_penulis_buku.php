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
        Schema::create('penulis_buku', function (Blueprint $table) {
            $table->unsignedBigInteger('penulis_id');
            $table->unsignedBigInteger('buku_id');

            $table->foreign('penulis_id')->references('id')->on('penulis')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penulis_buku');
    }
};
