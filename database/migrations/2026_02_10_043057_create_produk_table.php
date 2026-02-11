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
            $table->id('id_produk');
            $table->integer('id_produk_server');
            $table->integer('id_toko');
            $table->integer('id_kategori');
            $table->string('nama_produk');
            $table->string('harga_pokok');
            $table->string('harga_jual');
            $table->string('harga_diskon');
            $table->string('is_diskon');
            $table->string('harga_grosir');
            $table->integer('min_grosir');
            $table->string('kode_produk');
            $table->string('pengaturan_stok');
            $table->string('pengaturan_harga_stok');
            $table->string('jumlah_stok');
            $table->string('limit_stok');
            $table->string('harga_total_limit_stok');
            $table->string('harga_satu_beli_stok');
            $table->string('pengaturan_harga_jual');
            $table->string('satuan');
            $table->string('berat');
            $table->string('lokasi');
            $table->text('deskripsi_produk');
            $table->string('gambar');
            $table->string('serial_number');
            $table->string('dijual');
            $table->string('multi_produk');
            $table->string('varian_harga_jual');
            $table->string('ekstra_produk');
            $table->string('harga_jual_margin');
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
