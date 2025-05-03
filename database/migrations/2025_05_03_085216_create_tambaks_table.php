<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambaksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Pastikan tabel petambaks ada
        if (!Schema::hasTable('petambaks')) {
            // Jika tidak ada, kembalikan pesan error
            echo "Error: Tabel petambaks belum ada. Jalankan migrasi petambaks terlebih dahulu.\n";
            return;
        }

        Schema::create('tambaks', function (Blueprint $table) {
            $table->id('id_tambak');
            $table->unsignedBigInteger('id_petambak');
            $table->string('nama_tambak', 50);
            $table->string('lokasi', 200);
            $table->decimal('luas_area', 10, 2)->comment('Luas area dalam meter persegi');
            $table->decimal('kedalaman', 5, 2)->comment('Kedalaman dalam meter');
            $table->date('tanggal_pembuatan');
            $table->enum('status', ['aktif', 'tidak aktif', 'perbaikan'])->default('aktif');
            $table->timestamps();

            // Foreign key constraint - dengan pengecekan kolom
            $table->foreign('id_petambak')
                ->references('id_petambak')
                ->on('petambaks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambaks');
    }
}
