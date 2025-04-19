<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'manager', 'operator', 'pengawas', 'pemilik'])->default('operator')->after('password');
            $table->boolean('is_active')->default(true)->after('role');
            $table->foreignId('karyawan_id')->nullable()->after('is_active')->constrained()->nullOnDelete();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['karyawan_id']);
            $table->dropColumn(['role', 'is_active', 'karyawan_id']);
        });
    }
}
