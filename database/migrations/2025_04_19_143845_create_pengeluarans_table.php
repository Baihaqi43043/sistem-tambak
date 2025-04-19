<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tambak_id')->constrained()->onDelete('cascade');
            $table->enum('kategori', [
                'pakan',
                'benih',
                'obat',
                'vitamin',
                'probiotik',
                'peralatan',
                'listrik',
                'bahan_bakar',
                'gaji',
                'transportasi',
                'lain_lain'
            ]);
            $table->date('tanggal');
            $table->string('nama_item', 150);
            $table->decimal('jumlah', 15, 2);
            $table->string('pembayaran', 50)->comment('cash/transfer/hutang');
            $table->string('supplier', 150)->nullable();
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
        Schema::dropIfExists('pengeluarans');
    }
}
