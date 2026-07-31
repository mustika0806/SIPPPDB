<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quran_tes', function (Blueprint $table) {
            $table->unsignedTinyInteger('juz')
                ->nullable()
                ->after('test_date');

            $table->string('surat', 100)
                ->nullable()
                ->after('juz');

            $table->string('ayat', 100)
                ->nullable()
                ->after('surat');

            $table->text('keterangan_bacaan')
                ->nullable()
                ->after('ayat');

            $table->string('status')
                ->default('Menunggu Penilaian')
                ->after('notes');
        });
    }

    public function down(): void
    {
        Schema::table('quran_tes', function (Blueprint $table) {
            $table->dropColumn([
                'juz',
                'surat',
                'ayat',
                'keterangan_bacaan',
                'status',
            ]);
        });
    }
};