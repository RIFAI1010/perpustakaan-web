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
            $table->foreignUuid('id_penulis')->references('id')->on('penulis')->cascadeOnDelete();
            $table->foreignUuid('id_buku')->references('id')->on('bukus')->cascadeOnDelete();
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
