<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('merk', 100);
            $table->string('jenis', 50);
            $table->string('ukuran', 50)->nullable();
            $table->float('protein', 5, 2)->nullable()->comment('persentase protein');
            $table->decimal('harga_per_kg', 10, 2);
            $table->float('stok', 10, 2)->comment('dalam kg');
            $table->string('supplier', 150)->nullable();
            $table->date('tanggal_beli');
            $table->date('tanggal_kadaluarsa')->nullable();
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
        Schema::dropIfExists('pakans');
    }
}
