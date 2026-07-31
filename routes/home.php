<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\InterviewTestController;
use App\Http\Controllers\AdminQuranTesController;
use App\Http\Controllers\AdminHasilSeleksiController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AdminSiswaBaruController;
use App\Http\Controllers\AdminDaftarUlangController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\AdminUserAdminController;
use App\Http\Controllers\SiswaPendaftaranController;
use App\Http\Controllers\SiswaUploadDokumenController;
use App\Http\Controllers\SiswaSiswaBaruController;
use App\Http\Controllers\SiswaDaftarUlangController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\SiswaTesQuranController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SiswaPengumumanController;

/*
|--------------------------------------------------------------------------
| ROUTE YANG MEMERLUKAN LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::controller(DashboardController::class)
        ->group(function () {
            Route::get(
                '/dashboard',
                'index'
            )->name('dashboard');
        });

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')
        ->as('admin.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | JURUSAN DAN KUOTA
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminKelasController::class)
                ->group(function () {
                    Route::get(
                        '/kelas',
                        'index'
                    )->name('kelas.index');

                    Route::post(
                        '/kelas/store',
                        'store'
                    )->name('kelas.store');

                    Route::post(
                        '/kelas/{kelas}/update',
                        'update'
                    )->name('kelas.update');

                    Route::get(
                        '/kelas/{kelas}',
                        'destroy'
                    )->name('kelas.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | WAWANCARA ADMIN
            |--------------------------------------------------------------------------
            */
            Route::resource(
                'interview',
                InterviewTestController::class
            );

            /*
             * Membatalkan jadwal wawancara.
             * Setelah dibatalkan, WhatsApp akan dibuka
             * dengan pesan pembatalan.
             */
            Route::post(
                '/interview/{interview}/batalkan',
                [InterviewTestController::class, 'batalkan']
            )->name('interview.batalkan');

            /*
            |--------------------------------------------------------------------------
            | TES AL-QURAN ADMIN
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminQuranTesController::class)
                ->group(function () {
                    Route::get(
                        '/quran',
                        'index'
                    )->name('quran.index');

                    Route::get(
                        '/quran/create',
                        'create'
                    )->name('quran.create');

                    Route::post(
                        '/quran/store',
                        'store'
                    )->name('quran.store');

                    Route::get(
                        '/quran/{quranTest}/edit',
                        'edit'
                    )->name('quran.edit');

                    Route::put(
                        '/quran/{quran}/update',
                        'update'
                    )->name('quran.update');

                    Route::delete(
                        '/quran/{quranTest}/destroy',
                        'destroy'
                    )->name('quran.destroy');

                    Route::get(
                        '/quran/{quranTest}',
                        'show'
                    )->name('quran.show');
                });

            /*
            |--------------------------------------------------------------------------
            | JADWAL PENDAFTARAN ADMIN
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminPendaftaranController::class)
                ->group(function () {
                    Route::get(
                        '/pendaftaran',
                        'index'
                    )->name('pendaftaran.index');

                    Route::post(
                        '/pendaftaran/store',
                        'store'
                    )->name('pendaftaran.store');

                    Route::post(
                        '/pendaftaran/{pendaftaran}/update',
                        'update'
                    )->name('pendaftaran.update');

                    Route::get(
                        '/pendaftaran/{pendaftaran}/destroy',
                        'destroy'
                    )->name('pendaftaran.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | DATA SISWA ADMIN
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminSiswaBaruController::class)
                ->group(function () {
                    Route::get(
                        '/siswa',
                        'index'
                    )->name('siswa.index');

                    Route::get(
                        '/siswa/{siswa}/confirmation',
                        'confirmation'
                    )->name('siswa.confirmation');

                    Route::get(
                        '/siswa/{siswa}/notconfirm',
                        'notconfirm'
                    )->name('siswa.notconfirm');

                    Route::get(
                        '/siswa/{siswa}/perbaiki_data',
                        'perbaiki_data'
                    )->name('siswa.perbaiki_data');

                    Route::get(
                        '/siswa/{siswa}/perbaiki_dokumen',
                        'perbaiki_dokumen'
                    )->name('siswa.perbaiki_dokumen');

                    Route::get(
                        '/siswa/{siswa}',
                        'destroy'
                    )->name('siswa.destroy');

                    Route::get(
                        '/siswa/{siswa}/download',
                        'download'
                    )->name('siswa.download');

                    Route::get(
                        '/siswa/{siswa}/cetak',
                        'cetak'
                    )->name('siswa.cetak');

                    Route::get(
                        '/siswa/{siswa}/dokumen_download',
                        'dokumen_download'
                    )->name('siswa.dokumen_download');

                    Route::get(
                        '/siswa/{siswa}/dokumen_cetak',
                        'dokumen_cetak'
                    )->name('siswa.dokumen_cetak');

                    Route::get(
                        '/siswa/lulus/{siswa}',
                        'lulus'
                    )->name('siswa.lulus');
                });

            /*
            |--------------------------------------------------------------------------
            | DAFTAR ULANG ADMIN
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminDaftarUlangController::class)
                ->group(function () {
                    Route::get(
                        '/daftar_ulang',
                        'index'
                    )->name('daftar_ulang.index');
                });

            /*
            |--------------------------------------------------------------------------
            | DATA HASIL AKHIR
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminHasilSeleksiController::class)
                ->group(function () {
                    Route::get(
                        '/hasil_akhir',
                        'index'
                    )->name('hasil_akhir.index');

                    Route::put(
                        '/hasil_akhir/{siswa}/status',
                        'updateStatus'
                    )->name('hasil_akhir.update-status');
                });

            /*
            |--------------------------------------------------------------------------
            | DATA REKAPAN
            |--------------------------------------------------------------------------
            */
            Route::controller(
                \App\Http\Controllers\RekapController::class
            )->group(function () {
                Route::get(
                    '/rekap',
                    'index'
                )->name('rekap.index');

                Route::get(
                    '/rekapan',
                    'index'
                )->name('rekapan.index');

                Route::post(
                    '/rekap/update',
                    'update'
                )->name('rekap.update');

                Route::get(
                    '/rekap/print',
                    'print'
                )->name('rekap.print');

                Route::get(
                    '/rekap/export-csv',
                    'exportCsv'
                )->name('rekap.export-csv');
            });

            /*
            |--------------------------------------------------------------------------
            | ALUMNI
            |--------------------------------------------------------------------------
            */
            Route::controller(AlumniController::class)
                ->as('alumni.')
                ->group(function () {
                    Route::get(
                        '/alumni',
                        'index'
                    )->name('index');

                    Route::get(
                        '/alumni/download/{siswa}',
                        'download'
                    )->name('download');
                });

            /*
            |--------------------------------------------------------------------------
            | GALERI
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminGaleriController::class)
                ->group(function () {
                    Route::get(
                        '/galeri',
                        'index'
                    )->name('galeri.index');

                    Route::post(
                        '/galeri/store',
                        'store'
                    )->name('galeri.store');

                    Route::post(
                        '/galeri/{galeri}/update',
                        'update'
                    )->name('galeri.update');

                    Route::get(
                        '/galeri/{galeri}/destroy',
                        'destroy'
                    )->name('galeri.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | INFORMASI
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminInfoController::class)
                ->group(function () {
                    Route::get(
                        '/info',
                        'index'
                    )->name('info.index');

                    Route::post(
                        '/info/store',
                        'store'
                    )->name('info.store');

                    Route::post(
                        '/info/{post}/update',
                        'update'
                    )->name('info.update');

                    Route::get(
                        '/info/{post}/destroy',
                        'destroy'
                    )->name('info.destroy');

                    Route::post(
                        '/kategori/store',
                        'category_store'
                    )->name('kategori.store');

                    Route::post(
                        '/kategori/{category}/update',
                        'category_update'
                    )->name('kategori.update');

                    Route::get(
                        '/kategori/{category}/destroy',
                        'category_destroy'
                    )->name('kategori.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | USER ADMIN
            |--------------------------------------------------------------------------
            */
            Route::controller(AdminUserAdminController::class)
                ->group(function () {
                    Route::get(
                        '/user',
                        'index'
                    )->name('user.index');

                    Route::post(
                        '/user/store',
                        'store'
                    )->name('user.store');

                    Route::post(
                        '/user/{user}/update',
                        'update'
                    )->name('user.update');

                    Route::get(
                        '/user/{user}/destroy',
                        'destroy'
                    )->name('user.destroy');
                });
        });

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    Route::prefix('siswa')
        ->as('siswa.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | PENDAFTARAN SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaPendaftaranController::class)
                ->group(function () {
                    Route::get(
                        '/pendaftaran',
                        'index'
                    )->name('pendaftaran.index');

                    Route::post(
                        '/pendaftaran/store',
                        'store'
                    )->name('pendaftaran.store');

                    Route::post(
                        '/pendaftaran/biodata',
                        'biodata'
                    )->name('pendaftaran.biodata');

                    Route::post(
                        '/pendaftaran/wali',
                        'wali'
                    )->name('pendaftaran.wali');

                    Route::post(
                        '/pendaftaran/sekolah',
                        'sekolah'
                    )->name('pendaftaran.sekolah');

                    Route::post(
                        '/pendaftaran/{siswa}/update',
                        'update'
                    )->name('pendaftaran.update');

                    Route::get(
                        '/pendaftaran/{siswa}/destroy',
                        'destroy'
                    )->name('pendaftaran.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | UPLOAD DOKUMEN SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaUploadDokumenController::class)
                ->group(function () {
                    Route::get(
                        '/dokumen',
                        'index'
                    )->name('dokumen.index');

                    Route::post(
                        '/dokumen/store',
                        'store'
                    )->name('dokumen.store');

                    Route::post(
                        '/dokumen/{siswa}/update',
                        'update'
                    )->name('dokumen.update');

                    Route::get(
                        '/dokumen/{siswa}/destroy',
                        'destroy'
                    )->name('dokumen.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | DATA SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaSiswaBaruController::class)
                ->group(function () {
                    Route::get(
                        '/data',
                        'index'
                    )->name('siswa.index');

                    Route::get(
                        '/data/{siswa}/confirmation',
                        'confirmation'
                    )->name('siswa.confirmation');

                    Route::get(
                        '/data/{siswa}/notconfirm',
                        'notconfirm'
                    )->name('siswa.notconfirm');

                    Route::get(
                        '/data/{siswa}/perbaiki_data',
                        'perbaiki_data'
                    )->name('siswa.perbaiki_data');

                    Route::get(
                        '/data/{siswa}/perbaiki_dokumen',
                        'perbaiki_dokumen'
                    )->name('siswa.perbaiki_dokumen');

                    Route::get(
                        '/data/{siswa}/download',
                        'download'
                    )->name('siswa.download');

                    Route::get(
                        '/data/{siswa}/cetak',
                        'cetak'
                    )->name('siswa.cetak');

                    Route::get(
                        '/data/{siswa}/dokumen_download',
                        'dokumen_download'
                    )->name('siswa.dokumen_download');

                    Route::get(
                        '/data/lulus/{siswa}',
                        'lulus'
                    )->name('siswa.lulus');
                });

            /*
            |--------------------------------------------------------------------------
            | DAFTAR ULANG SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaDaftarUlangController::class)
                ->group(function () {
                    Route::get(
                        '/daftar_ulang',
                        'index'
                    )->name('daftar_ulang.index');

                    Route::post(
                        '/daftar_ulang/store/{siswa}',
                        'store'
                    )->name('daftar_ulang.store');

                    Route::patch(
                        '/daftar-ulang/{id}/approve',
                        'approve'
                    )->name('admin.daftar_ulang.approve');

                    Route::delete(
                        '/daftar-ulang/{id}/tolak',
                        'tolak'
                    )->name('admin.daftar_ulang.tolak');
                });

            /*
            |--------------------------------------------------------------------------
            | KELAS SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaKelasController::class)
                ->group(function () {
                    Route::get(
                        '/kelas',
                        'index'
                    )->name('kelas.index');

                    Route::post(
                        '/kelas/store',
                        'store'
                    )->name('kelas.store');

                    Route::post(
                        '/kelas/{kelas}/update',
                        'update'
                    )->name('kelas.update');

                    Route::get(
                        '/kelas/{kelas}',
                        'destroy'
                    )->name('kelas.destroy');
                });

            /*
            |--------------------------------------------------------------------------
            | TES AL-QURAN SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(SiswaTesQuranController::class)
                ->group(function () {
                    Route::get(
                        '/tes/quran',
                        'index'
                    )->name('tes.quran.index');

                    Route::post(
                        '/tes/quran/store',
                        'store'
                    )->name('tes.quran.store');
                });

            /*
            |--------------------------------------------------------------------------
            | WAWANCARA SISWA
            |--------------------------------------------------------------------------
            */
            Route::controller(InterviewTestController::class)
                ->group(function () {
                    Route::get(
                        '/interview',
                        'siswaIndex'
                    )->name('interview.index');
                });
        });

    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI
    |--------------------------------------------------------------------------
    */
    Route::controller(NotificationController::class)
        ->group(function () {
            Route::get(
                '/notifications/{user}/read',
                'read'
            )->name('notifications.read');
        });

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN SISWA
    |--------------------------------------------------------------------------
    */
    Route::controller(SiswaPengumumanController::class)
        ->group(function () {
            Route::get(
                '/pengumuman',
                'index'
            )->name('pengumuman.index');
        });
});