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
      Schema::create('produk', function (Blueprint $table) {

    $table->id('id_produk'); // PRIMARY KEY dulu



    $table->integer('id_produk_server');
    $table->integer('id_toko');
    $table->integer('id_kategori');
    $table->string('nama_produk');
    $table->string('harga_pokok');
    $table->string('harga_jual');
    $table->string('harga_diskon')->nullable();
    $table->string('is_diskon');
    $table->string('harga_grosir')->nullable();
    $table->integer('min_grosir')->nullable();
    $table->string('kode_produk')->nullable();
    $table->string('pengaturan_stok');
    $table->string('pengaturan_harga_stok');
    $table->string('jumlah_stok')->nullable();
    $table->string('limit_stok')->nullable();
    $table->string('harga_total_limit_stok')->nullable();
    $table->string('harga_satu_beli_stok')->nullable();
    $table->string('pengaturan_harga_jual');
    $table->string('satuan')->nullable();
    $table->string('berat')->nullable();
    $table->string('lokasi')->nullable();
    $table->text('deskripsi_produk')->nullable();
    $table->string('gambar')->nullable();
    $table->string('serial_number')->nullable();
    $table->string('dijual');
    $table->string('multi_produk')->nullable();
    $table->string('varian_harga_jual')->nullable();
    $table->string('ekstra_produk')->nullable();
    $table->string('harga_jual_margin')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
