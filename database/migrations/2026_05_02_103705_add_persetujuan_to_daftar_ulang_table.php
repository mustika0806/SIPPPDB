<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('daftar_ulangs', function (Blueprint $table) {
            $table->enum('persetujuan', ['pending', 'disetujui', 'ditolak'])
                ->default('pending')
                ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_ulang', function (Blueprint $table) {
            //
        });
    }
};
