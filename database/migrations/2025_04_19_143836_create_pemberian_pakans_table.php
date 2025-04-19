<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemberianPakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemberian_pakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->foreignId('pakan_id')->constrained()->onDelete('cascade');
            $table->float('jumlah', 8, 2)->comment('dalam kg');
            $table->decimal('biaya', 10, 2)->comment('jumlah * harga_per_kg');
            $table->datetime('waktu_pemberian');
            $table->string('pemberi', 100)->nullable();
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
        Schema::dropIfExists('pemberian_pakans');
    }
}
