<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiklusBudidayaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siklus_budidaya', function (Blueprint $table) {
            $table->id('id_siklus');
            $table->unsignedBigInteger('id_tambak');
            $table->enum('jenis_budidaya', ['udang', 'ikan']);
            $table->string('spesies', 100);
            $table->date('tanggal_mulai');
            $table->date('tanggal_panen_estimasi')->nullable();
            $table->integer('jumlah_tebar')->comment('Jumlah benih ditebar dalam ekor');
            $table->enum('status_siklus', ['aktif', 'selesai'])->default('aktif');
            $table->text('catatan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_tambak')
                ->references('id_tambak')
                ->on('tambaks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siklus_budidaya');
    }
}
