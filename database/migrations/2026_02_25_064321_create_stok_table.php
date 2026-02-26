<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('id_produk');

    $table->enum('tipe', ['tambah', 'kurang','kembali']);
    $table->integer('qty');

    $table->string('supplier')->nullable();
    $table->decimal('harga_total', 15, 2)->nullable();
    $table->decimal('harga_satuan', 15, 2)->nullable();
    $table->enum('status_bayar', ['lunas', 'hutang'])->nullable();
    $table->string('pembayaran')->nullable();
    $table->date('tanggal_input')->nullable();
    $table->date('expired')->nullable();
    $table->text('keterangan')->nullable();

    $table->timestamps();

    // Foreign key manual (penting!)
    $table->foreign('id_produk')
          ->references('id_produk')
          ->on('produk')
          ->onDelete('cascade');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
