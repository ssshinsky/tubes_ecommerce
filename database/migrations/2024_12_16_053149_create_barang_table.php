<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel barang.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kategori');
            $table->text('deskripsi')->nullable(); 
            $table->string('gambar')->nullable(); 
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Balikkan perubahan jika migration dibatalkan.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
