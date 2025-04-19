<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->string('jenis', 100);
            $table->string('strain', 100)->nullable();
            $table->integer('jumlah')->unsigned();
            $table->float('berat_awal_rata_rata', 8, 2)->nullable()->comment('dalam gram');
            $table->date('tanggal_tebar');
            $table->date('perkiraan_panen');
            $table->decimal('harga_beli_per_ekor', 12, 2);
            $table->decimal('total_harga_beli', 12, 2);
            $table->string('supplier', 150)->nullable();
            $table->string('sumber', 100)->nullable()->comment('pembenih/supplier');
            $table->enum('status', ['aktif', 'panen_sebagian', 'panen_total', 'gagal'])->default('aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikans');
    }
}
