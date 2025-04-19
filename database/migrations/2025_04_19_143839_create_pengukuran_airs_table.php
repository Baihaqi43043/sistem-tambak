<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukuranAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengukuran_airs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->float('ph', 5, 2)->nullable();
            $table->float('suhu', 5, 2)->nullable()->comment('dalam celsius');
            $table->float('oksigen', 5, 2)->nullable()->comment('DO dalam mg/L');
            $table->float('salinitas', 5, 2)->nullable()->comment('dalam ppt');
            $table->float('kekeruhan', 5, 2)->nullable()->comment('dalam NTU');
            $table->float('amonia', 5, 2)->nullable()->comment('dalam mg/L');
            $table->float('nitrit', 5, 2)->nullable()->comment('dalam mg/L');
            $table->float('nitrat', 5, 2)->nullable()->comment('dalam mg/L');
            $table->datetime('waktu_pengukuran');
            $table->string('pengukur', 100)->nullable();
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
        Schema::dropIfExists('pengukuran_airs');
    }
}
