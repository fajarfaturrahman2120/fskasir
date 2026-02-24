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
        Schema::create('stok', function (Blueprint $table) {

            $table->id();

            // HARUS sama tipe dengan id_produk di produks
            $table->unsignedBigInteger('id_produk');

            $table->enum('tipe', ['tambah', 'kurang', 'kembalian']);
            $table->integer('qty');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // foreign key manual (JANGAN pakai constrained())
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
