<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->string('jenis_treatment', 100);
            $table->datetime('waktu_treatment');
            $table->string('nama_produk', 150)->nullable();
            $table->float('dosis', 8, 2)->nullable();
            $table->string('satuan_dosis', 20)->nullable();
            $table->string('pemberi_treatment', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
