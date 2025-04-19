<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->foreignId('ikan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_panen');
            $table->integer('jumlah_ekor')->unsigned();
            $table->float('berat_total', 10, 2)->comment('dalam kg');
            $table->float('berat_rata_rata', 8, 2)->nullable()->comment('dalam gram');
            $table->decimal('harga_jual_per_kg', 12, 2);
            $table->decimal('total_penjualan', 15, 2);
            $table->string('pembeli', 150)->nullable();
            $table->enum('jenis_panen', ['sebagian', 'total'])->default('total');
            $table->float('fcr', 5, 2)->nullable()->comment('feed conversion ratio');
            $table->float('sr', 5, 2)->nullable()->comment('survival rate dalam persentase');
            $table->float('adg', 5, 2)->nullable()->comment('average daily growth dalam gram');
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
        Schema::dropIfExists('panens');
    }
}
