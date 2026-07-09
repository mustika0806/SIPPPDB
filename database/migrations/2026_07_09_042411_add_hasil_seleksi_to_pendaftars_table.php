<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            if (!Schema::hasColumn('siswas', 'nilai_quran')) {
                $table->integer('nilai_quran')->nullable();
            }

            if (!Schema::hasColumn('siswas', 'nilai_wawancara')) {
                $table->integer('nilai_wawancara')->nullable();
            }

            if (!Schema::hasColumn('siswas', 'total_nilai')) {
                $table->decimal('total_nilai', 5, 2)->nullable();
            }

            if (!Schema::hasColumn('siswas', 'jadwal_daftar_ulang')) {
                $table->string('jadwal_daftar_ulang')->nullable();
            }

            if (!Schema::hasColumn('siswas', 'tempat_daftar_ulang')) {
                $table->string('tempat_daftar_ulang')->nullable();
            }

            if (!Schema::hasColumn('siswas', 'catatan_admin')) {
                $table->text('catatan_admin')->nullable();
            }

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $columns = [
                'nilai_quran',
                'nilai_wawancara',
                'total_nilai',
                'jadwal_daftar_ulang',
                'tempat_daftar_ulang',
                'catatan_admin',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('siswas', $column)) {
                    $table->dropColumn($column);
                }
            }

        });
    }
};