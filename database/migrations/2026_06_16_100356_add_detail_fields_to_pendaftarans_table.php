<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftarans', 'mulai')) {
                $table->date('mulai')->nullable()->after('alamat');
            }

            if (!Schema::hasColumn('pendaftarans', 'berakhir')) {
                $table->date('berakhir')->nullable()->after('mulai');
            }

            if (!Schema::hasColumn('pendaftarans', 'tahun_akademik')) {
                $table->string('tahun_akademik')->nullable()->after('berakhir');
            }

            if (!Schema::hasColumn('pendaftarans', 'tes_quran')) {
                $table->integer('tes_quran')->nullable()->after('tahun_akademik');
            }

            if (!Schema::hasColumn('pendaftarans', 'catatan_tes_quran')) {
                $table->text('catatan_tes_quran')->nullable()->after('tes_quran');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            if (Schema::hasColumn('pendaftarans', 'catatan_tes_quran')) {
                $table->dropColumn('catatan_tes_quran');
            }

            if (Schema::hasColumn('pendaftarans', 'tes_quran')) {
                $table->dropColumn('tes_quran');
            }

            if (Schema::hasColumn('pendaftarans', 'tahun_akademik')) {
                $table->dropColumn('tahun_akademik');
            }

            if (Schema::hasColumn('pendaftarans', 'berakhir')) {
                $table->dropColumn('berakhir');
            }

            if (Schema::hasColumn('pendaftarans', 'mulai')) {
                $table->dropColumn('mulai');
            }
        });
    }
};