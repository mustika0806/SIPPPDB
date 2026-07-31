<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE interview_tests
            MODIFY COLUMN status ENUM(
                'belum',
                'terjadwal',
                'lulus',
                'tidak_lulus',
                'dibatalkan'
            ) NOT NULL DEFAULT 'belum'
        ");
    }

    public function down(): void
    {
        /*
         * Ubah data dibatalkan terlebih dahulu,
         * agar rollback tidak gagal.
         */
        DB::table('interview_tests')
            ->where('status', 'dibatalkan')
            ->update([
                'status' => 'belum',
            ]);

        DB::statement("
            ALTER TABLE interview_tests
            MODIFY COLUMN status ENUM(
                'belum',
                'terjadwal',
                'lulus',
                'tidak_lulus'
            ) NOT NULL DEFAULT 'belum'
        ");
    }
};