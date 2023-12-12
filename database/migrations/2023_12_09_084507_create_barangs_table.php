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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titikantar_id');
            $table->foreignId('kategori_id');
            $table->foreignId('armada_id');
            $table->string('nomor_resi');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->string('nama_pengirim');
            $table->string('nama_penerima');
            $table->string('nomor_penerima');
            $table->string('lokasi_penerima');
            $table->string('tanggal_pengiriman');
            $table->boolean('is_perjalanan')->default(0);
            $table->boolean('is_sampai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
