<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('dokumen_siswas', function (Blueprint $table) {
            $table->string('file_kip')->nullable()->change();
            $table->string('file_keputusan')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('dokumen_siswas', function (Blueprint $table) {
            $table->string('file_kip')->nullable(false)->change();
        });
    }
};