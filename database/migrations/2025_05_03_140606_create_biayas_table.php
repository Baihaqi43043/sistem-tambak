<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biayas', function (Blueprint $table) {
            $table->id('id_biaya');
            $table->unsignedBigInteger('id_siklus');
            $table->unsignedBigInteger('id_kategori');
            $table->date('tanggal_pengeluaran');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('total_biaya', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Perbaikan referensi ke tabel siklus_budidaya
            $table->foreign('id_siklus')
                ->references('id_siklus')
                ->on('siklus_budidaya');

            // Referensi ke kategori_biayas
            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori_biayas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biayas');
    }
}
