<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan jadwal tahapan PPDB.
     */
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftarans', 'gelombang')) {
                $table->string('gelombang')
                    ->nullable()
                    ->after('alamat');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_pendaftaran'
                )
            ) {
                $table->date('tanggal_buka_pendaftaran')
                    ->nullable()
                    ->after('gelombang');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_pendaftaran'
                )
            ) {
                $table->date('tanggal_akhir_pendaftaran')
                    ->nullable()
                    ->after('tanggal_buka_pendaftaran');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_seleksi'
                )
            ) {
                $table->date('tanggal_buka_seleksi')
                    ->nullable()
                    ->after('tanggal_akhir_pendaftaran');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_seleksi'
                )
            ) {
                $table->date('tanggal_akhir_seleksi')
                    ->nullable()
                    ->after('tanggal_buka_seleksi');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_pengumuman'
                )
            ) {
                $table->date('tanggal_buka_pengumuman')
                    ->nullable()
                    ->after('tanggal_akhir_seleksi');
            }

            if (
                !Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_pengumuman'
                )
            ) {
                $table->date('tanggal_akhir_pengumuman')
                    ->nullable()
                    ->after('tanggal_buka_pengumuman');
            }

            if (!Schema::hasColumn('pendaftarans', 'status')) {
                $table->enum('status', [
                    'Aktif',
                    'Tidak Aktif',
                ])
                    ->default('Aktif')
                    ->after('tahun_akademik');
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Pindahkan tanggal jadwal lama
        |--------------------------------------------------------------------------
        | Nilai "mulai" dan "berakhir" lama dipindahkan ke tanggal pendaftaran
        | agar data lama tidak hilang.
        */
        if (
            Schema::hasColumn('pendaftarans', 'mulai') &&
            Schema::hasColumn('pendaftarans', 'berakhir') &&
            Schema::hasColumn(
                'pendaftarans',
                'tanggal_buka_pendaftaran'
            ) &&
            Schema::hasColumn(
                'pendaftarans',
                'tanggal_akhir_pendaftaran'
            )
        ) {
            DB::table('pendaftarans')
                ->whereNull('tanggal_buka_pendaftaran')
                ->whereNotNull('mulai')
                ->update([
                    'tanggal_buka_pendaftaran' =>
                        DB::raw('mulai'),
                ]);

            DB::table('pendaftarans')
                ->whereNull('tanggal_akhir_pendaftaran')
                ->whereNotNull('berakhir')
                ->update([
                    'tanggal_akhir_pendaftaran' =>
                        DB::raw('berakhir'),
                ]);
        }
    }

    /**
     * Menghapus kolom jadwal tahapan.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $columns = [];

            if (Schema::hasColumn('pendaftarans', 'status')) {
                $columns[] = 'status';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_pengumuman'
                )
            ) {
                $columns[] = 'tanggal_akhir_pengumuman';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_pengumuman'
                )
            ) {
                $columns[] = 'tanggal_buka_pengumuman';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_seleksi'
                )
            ) {
                $columns[] = 'tanggal_akhir_seleksi';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_seleksi'
                )
            ) {
                $columns[] = 'tanggal_buka_seleksi';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_akhir_pendaftaran'
                )
            ) {
                $columns[] = 'tanggal_akhir_pendaftaran';
            }

            if (
                Schema::hasColumn(
                    'pendaftarans',
                    'tanggal_buka_pendaftaran'
                )
            ) {
                $columns[] = 'tanggal_buka_pendaftaran';
            }

            if (Schema::hasColumn('pendaftarans', 'gelombang')) {
                $columns[] = 'gelombang';
            }

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};