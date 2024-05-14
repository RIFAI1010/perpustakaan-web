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
        Schema::create('user_menandai_buku', function (Blueprint $table) {
            $table->foreignUuid('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignUuid('id_buku')->references('id')->on('bukus')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_menandai_buku');
    }
};
