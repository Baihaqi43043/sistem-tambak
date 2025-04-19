<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyakitIkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakit_ikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->string('nama_penyakit', 150);
            $table->date('tanggal_deteksi');
            $table->text('gejala')->nullable();
            $table->integer('jumlah_ikan_terinfeksi')->unsigned()->nullable();
            $table->float('tingkat_kematian', 5, 2)->nullable()->comment('dalam persentase');
            $table->string('cara_penanganan', 200)->nullable();
            $table->enum('status', ['aktif', 'teratasi'])->default('aktif');
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
        Schema::dropIfExists('penyakit_ikans');
    }
}
