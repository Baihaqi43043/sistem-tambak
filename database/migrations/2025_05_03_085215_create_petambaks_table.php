<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetambaksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('petambaks', function (Blueprint $table) {
            $table->id('id_petambak');
            $table->string('nama_petambak', 100);
            $table->text('alamat');
            $table->string('nomor_telepon', 15);
            $table->string('email', 100)->nullable();
            $table->date('tanggal_registrasi');
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petambaks');
    }
}
