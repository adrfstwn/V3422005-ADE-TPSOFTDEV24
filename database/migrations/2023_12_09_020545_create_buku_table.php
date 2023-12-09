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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->String('judul_buku')->nullable();
            $table->unsignedBigInteger('id_penulis')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->String('tahun_terbit')->nullable();
            $table->String('penerbit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
