<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tambak_id')->constrained()->onDelete('cascade');
            $table->string('nama_aset', 150);
            $table->string('kategori', 100);
            $table->integer('jumlah')->unsigned();
            $table->string('satuan', 50)->nullable();
            $table->decimal('nilai_perolehan', 15, 2);
            $table->date('tanggal_perolehan');
            $table->integer('masa_pakai')->unsigned()->nullable()->comment('dalam bulan');
            $table->text('spesifikasi')->nullable();
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat', 'tidak_berfungsi'])->default('baik');
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
        Schema::dropIfExists('asets');
    }
}
