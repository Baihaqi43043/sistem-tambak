<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id('id_panen');
            $table->unsignedBigInteger('id_siklus');
            $table->date('tanggal_panen');
            $table->decimal('harga', 10, 2)->comment('harga dalam Rupiah');
            $table->decimal('berat_total', 10, 2)->nullable()->comment('Berat hasil panen dalam kilogram');
            $table->string('catatan', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_siklus')
                ->references('id_siklus')
                ->on('siklus_budidaya')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panens');
    }
}
