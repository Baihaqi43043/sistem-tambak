<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomoditasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Migrasi untuk tabel komoditas
        Schema::create('komoditas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100); // Misalnya: Nila, Lele, Udang Vannamei, Kepiting Bakau
            $table->string('jenis', 50); // Ikan, Udang, Kepiting
            $table->string('kode', 20)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Migrasi untuk tabel tebar bibit
        Schema::create('tebar_bibit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained('kolams');
            $table->foreignId('komoditas_id')->constrained('komoditas');
            $table->date('tanggal_tebar');
            $table->integer('jumlah_bibit');
            $table->float('bobot_rata_rata', 8, 2)->comment('dalam gram');
            $table->decimal('harga_bibit', 12, 2);
            $table->string('supplier')->nullable();
            $table->date('tanggal_target_panen')->nullable();
            $table->string('status', 20)->default('aktif'); // aktif, panen, mati
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Migrasi untuk tabel monitoring pertumbuhan
        Schema::create('monitoring_pertumbuhan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tebar_bibit_id')->constrained('tebar_bibit');
            $table->date('tanggal_pengukuran');
            $table->float('bobot_rata_rata', 8, 2)->comment('dalam gram');
            $table->float('panjang_rata_rata', 8, 2)->nullable()->comment('dalam cm');
            $table->integer('jumlah_sampling');
            $table->integer('estimasi_jumlah_hidup');
            $table->float('tingkat_kelangsungan_hidup', 5, 2)->nullable()->comment('dalam %');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Migrasi untuk tabel penyakit dan pengobatan
        Schema::create('penyakit_pengobatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tebar_bibit_id')->constrained('tebar_bibit');
            $table->date('tanggal_ditemukan');
            $table->string('nama_penyakit', 100);
            $table->text('gejala');
            $table->string('jenis_obat', 100)->nullable();
            $table->text('cara_pengobatan')->nullable();
            $table->date('tanggal_pengobatan')->nullable();
            $table->string('hasil', 50)->nullable(); // sembuh, sebagian sembuh, tidak efektif
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
        Schema::dropIfExists('ikans');
    }
}
