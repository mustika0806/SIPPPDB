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
use App\Http\Controllers\RekapanController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\AdminRekapanController;
use App\Http\Controllers\AdminUserAdminController;
use App\Http\Controllers\SiswaPendaftaranController;
use App\Http\Controllers\SiswaUploadDokumenController;
use App\Http\Controllers\SiswaSiswaBaruController;
use App\Http\Controllers\SiswaDaftarUlangController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\SiswaTesQuranController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SiswaPengumumanController;

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // ================== ADMIN ==================
    Route::prefix('admin')->as('admin.')->group(function () {

        // Kelas
        Route::controller(AdminKelasController::class)->group(function () {
            Route::get('/kelas', 'index')->name('kelas.index');
            Route::post('/kelas/store', 'store')->name('kelas.store');
            Route::post('/kelas/{kelas}/update', 'update')->name('kelas.update');
            Route::get('/kelas/{kelas}', 'destroy')->name('kelas.destroy');
        });

        // Wawancara
        Route::resource('interview', InterviewTestController::class);

        // Tes Quran admin
        // Route::resource('quran', AdminQuranTesController::class);
        Route::controller(AdminQuranTesController::class)->group(function () {
            // Menampilkan semua tes Quran
            Route::get('/quran', 'index')->name('quran.index');

            // Form tambah tes Quran
            Route::get('/quran/create', 'create')->name('quran.create');

            // Simpan tes Quran baru
            Route::post('/quran/store', 'store')->name('quran.store');

            // Form edit tes Quran
            Route::get('/quran/{quranTest}/edit', 'edit')->name('quran.edit');

            // Update tes Quran
            Route::put('/quran/{quran}/update', 'update')->name('quran.update');

            // Hapus tes Quran
            Route::delete('/quran/{quranTest}/destroy', 'destroy')->name('quran.destroy');

            // (Opsional) lihat detail tes Quran
            Route::get('/quran/{quranTest}', 'show')->name('quran.show');
        });


        // Pendaftaran admin
        Route::controller(AdminPendaftaranController::class)->group(function () {
            Route::get('/pendaftaran', 'index')->name('pendaftaran.index');
            Route::post('/pendaftaran/store', 'store')->name('pendaftaran.store');
            Route::post('/pendaftaran/{pendaftaran}/update', 'update')->name('pendaftaran.update');
            Route::get('/pendaftaran/{pendaftaran}/destroy', 'destroy')->name('pendaftaran.destroy');
        });


        // Siswa admin
        Route::controller(AdminSiswaBaruController::class)->group(function () {
            Route::get('/siswa', 'index')->name('siswa.index');
            Route::get('/siswa/{siswa}/confirmation', 'confirmation')->name('siswa.confirmation');
            Route::get('/siswa/{siswa}/notconfirm', 'notconfirm')->name('siswa.notconfirm');
            Route::get('/siswa/{siswa}/perbaiki_data', 'perbaiki_data')->name('siswa.perbaiki_data');
            Route::get('/siswa/{siswa}/perbaiki_dokumen', 'perbaiki_dokumen')->name('siswa.perbaiki_dokumen');
            Route::get('/siswa/{siswa}', 'destroy')->name('siswa.destroy');
            Route::get('/siswa/{siswa}/download', 'download')->name('siswa.download');
            Route::get('/siswa/{siswa}/cetak', 'cetak')->name('siswa.cetak');
            Route::get('/siswa/{siswa}/dokumen_download', 'dokumen_download')->name('siswa.dokumen_download');
            Route::get('/siswa/{siswa}/dokumen_cetak', 'dokumen_cetak')->name('siswa.dokumen_cetak');
            Route::get('siswa/lulus/{siswa}', 'lulus')->name('siswa.lulus');
        });

        // Daftar ulang admin
        Route::controller(AdminDaftarUlangController::class)->group(function () {
            Route::get('/daftar_ulang', 'index')->name('daftar_ulang.index');
        });

        // Data Hasil Akhir / Hasil Seleksi
        Route::controller(AdminHasilSeleksiController::class)->group(function () {
            Route::get('/hasil_akhir', 'index')->name('hasil_akhir.index');
            Route::post('/hasil_akhir/proses/{id}', 'proses')->name('hasil_akhir.proses');
            Route::post('/hasil_akhir/proses-semua', 'prosesSemua')->name('hasil_akhir.proses-semua');
        });

        // Rekap
        Route::controller(\App\Http\Controllers\RekapController::class)->group(function () {
            Route::get('/rekap', 'index')->name('rekap.index');
            Route::get('/rekapan', 'index')->name('rekapan.index');
            Route::post('/rekap/update', 'update')->name('rekap.update');
            Route::get('/rekap/print', 'print')->name('rekap.print');
            Route::get('/rekap/export-csv', 'exportCsv')->name('rekap.export-csv');
        });

        // Alumni
        Route::controller(AlumniController::class)->as('alumni.')->group(function () {
            Route::get('alumni', 'index')->name('index');
            Route::get('alumni/download/{siswa}', 'download')->name('download');
        });

        // Galeri
        Route::controller(AdminGaleriController::class)->group(function () {
            Route::get('/galeri', 'index')->name('galeri.index');
            Route::post('/galeri/store', 'store')->name('galeri.store');
            Route::post('/galeri/{galeri}/update', 'update')->name('galeri.update');
            Route::get('/galeri/{galeri}/destroy', 'destroy')->name('galeri.destroy');
        });

        // Info
        Route::controller(AdminInfoController::class)->group(function () {
            Route::get('/info', 'index')->name('info.index');
            Route::post('/info/store', 'store')->name('info.store');
            Route::post('/info/{post}/update', 'update')->name('info.update');
            Route::get('/info/{post}/destroy', 'destroy')->name('info.destroy');
            Route::post('/kategori/store', 'category_store')->name('kategori.store');
            Route::post('/kategori/{category}/update', 'category_update')->name('kategori.update');
            Route::get('/kategori/{category}/destroy', 'category_destroy')->name('kategori.destroy');
        });

        // User admin
        Route::controller(AdminUserAdminController::class)->group(function () {
            Route::get('/user', 'index')->name('user.index');
            Route::post('/user/store', 'store')->name('user.store');
            Route::post('/user/{user}/update', 'update')->name('user.update');
            Route::get('/user/{user}/destroy', 'destroy')->name('user.destroy');
        });
    });
}); // End grup admin

// ================== SISWA ==================
Route::prefix('siswa')->as('siswa.')->group(function () {

    // Pendaftaran siswa
    Route::controller(SiswaPendaftaranController::class)->group(function () {
        Route::get('/pendaftaran', 'index')->name('pendaftaran.index');
        Route::post('/pendaftaran/store', 'store')->name('pendaftaran.store');
        Route::post('/pendaftaran/biodata', 'biodata')->name('pendaftaran.biodata');
        Route::post('/pendaftaran/wali', 'wali')->name('pendaftaran.wali');
        Route::post('/pendaftaran/sekolah', 'sekolah')->name('pendaftaran.sekolah');
        Route::post('/pendaftaran/{siswa}/update', 'update')->name('pendaftaran.update');
        Route::get('/pendaftaran/{siswa}/destroy', 'destroy')->name('pendaftaran.destroy');
    });

    // Upload dokumen siswa
    Route::controller(SiswaUploadDokumenController::class)->group(function () {
        Route::get('/dokumen', 'index')->name('dokumen.index');
        Route::post('/dokumen/store', 'store')->name('dokumen.store');
        Route::post('/dokumen/{siswa}/update', 'update')->name('dokumen.update');
        Route::get('/dokumen/{siswa}/destroy', 'destroy')->name('pendaftaran.destroy');
    });

    // Data siswa
    Route::controller(SiswaSiswaBaruController::class)->group(function () {
        Route::get('/siswa', 'index')->name('siswa.index');
        Route::get('/siswa/{siswa}/confirmation', 'confirmation')->name('siswa.confirmation');
        Route::get('/siswa/{siswa}/notconfirm', 'notconfirm')->name('siswa.notconfirm');
        Route::get('/siswa/{siswa}/perbaiki_data', 'perbaiki_data')->name('siswa.perbaiki_data');
        Route::get('/siswa/{siswa}/perbaiki_dokumen', 'perbaiki_dokumen')->name('siswa.perbaiki_dokumen');
        Route::get('/siswa/{siswa}/download', 'download')->name('siswa.download');
        Route::get('/siswa/{siswa}/cetak', 'cetak')->name('siswa.cetak');
        Route::get('/siswa/{siswa}/dokumen_download', 'dokumen_download')->name('siswa.dokumen_download');
        Route::get('siswa/lulus/{siswa}', 'lulus')->name('siswa.lulus');
    });

    // Daftar ulang siswa
    Route::controller(SiswaDaftarUlangController::class)->group(function () {
        Route::get('/daftar_ulang', 'index')->name('daftar_ulang.index');
        Route::post('/daftar_ulang/store/{siswa}', 'store')->name('daftar_ulang.store');
        Route::patch('/admin/daftar-ulang/{id}/approve', 'approve')->name('admin.daftar_ulang.approve');
        Route::delete('/admin/daftar-ulang/{id}/tolak', 'tolak')->name('admin.daftar_ulang.tolak');
    });

    // Kelas siswa
    Route::controller(SiswaKelasController::class)->group(function () {
        Route::get('/kelas', 'index')->name('kelas.index');
        Route::post('/kelas/store', 'store')->name('kelas.store');
        Route::post('/kelas/{kelas}/update', 'update')->name('kelas.update');
        Route::get('/kelas/{kelas}', 'destroy')->name('kelas.destroy');
    });

    // Tes Quran siswa
    Route::controller(SiswaTesQuranController::class)->group(function () {
        Route::get('/tes/quran', 'index')->name('tes.quran.index');
        Route::post('/tes/quran/store', 'store')->name('tes.quran.store');
    });
    Route::controller(InterviewTestController::class)->group(function () {
        Route::get('/interview', 'siswaIndex')->name('interview.index');
    });
    // Route untuk siswa melihat wawancara
    // Route::get('/siswa/interview', [InterviewTestController::class, 'siswaIndex'])
    // ->name('siswa.interview.index');
});

// Notifications
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notifications/{user}/read', 'read')->name('notifications.read');
});

Route::controller(SiswaPengumumanController::class)->group(function () {
    Route::get('/pengumuman', 'index')->name('pengumuman.index');
});

