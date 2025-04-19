<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tambak_id')->constrained()->onDelete('cascade');
            $table->string('nama', 100);
            $table->float('luas', 8, 2)->comment('dalam meter persegi');
            $table->float('kedalaman', 5, 2)->comment('dalam meter');
            $table->float('volume', 10, 2)->comment('dalam meter kubik');
            $table->enum('bentuk', ['persegi', 'lingkaran', 'tidak beraturan'])->default('persegi');
            $table->enum('status', ['kosong', 'terisi', 'panen', 'maintenance'])->default('kosong');
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
        Schema::dropIfExists('kolams');
    }
}
