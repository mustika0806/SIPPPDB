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
        Schema::table('quran_tes', function (Blueprint $table) {
            $table->renameColumn('video_path', 'video_url');
        });
    }

    public function down(): void
    {
        Schema::table('quran_tes', function (Blueprint $table) {
            $table->renameColumn('video_url', 'video_path');
        });
    }
};
