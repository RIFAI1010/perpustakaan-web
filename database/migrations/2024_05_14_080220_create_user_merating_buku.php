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
        Schema::create('user_merating_buku', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->references('id')->on('users');
            $table->foreignUuid('id_buku')->references('id')->on('bukus');
            $table->unsignedDecimal('rate', 1, 1);
            $table->longText('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_merating_buku');
    }
};
