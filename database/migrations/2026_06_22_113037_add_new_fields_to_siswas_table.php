<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('siswas', 'no_akta_lahir')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('no_akta_lahir')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'kewarganegaraan')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('kewarganegaraan')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'kebutuhan_khusus')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('kebutuhan_khusus')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'anak_ke')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->integer('anak_ke')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'dusun')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('dusun')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'lintang')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('lintang')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'bujur')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('bujur')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'tempat_tinggal')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('tempat_tinggal')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'transportasi')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('transportasi')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'no_kks')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->string('no_kks')->nullable();
            });
        }

        if (!Schema::hasColumn('siswas', 'kps_pkp')) {
            Schema::table('siswas', function (Blueprint $table) {
                $table->boolean('kps_pkp')->nullable();
            });
        }
    }

    public function down(): void
    {
        $columns = [
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
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('siswas', $column)) {
                Schema::table('siswas', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};