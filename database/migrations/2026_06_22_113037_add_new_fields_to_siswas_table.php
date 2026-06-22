<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->string('nik')->nullable();
            $table->string('no_akta_lahir')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->integer('anak_ke')->nullable();

            $table->string('dusun')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();

            $table->string('tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();

            $table->string('no_kks')->nullable();
            $table->boolean('kps_pkp')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->dropColumn([
                'nik',
                'no_akta_lahir',
                'kewarganegaraan',
                'kebutuhan_khusus',
                'anak_ke',
                'dusun',
                'lintang',
                'bujur',
                'tempat_tinggal',
                'transportasi',
                'no_kks',
                'kps_pkp',
            ]);

        });
    }
};