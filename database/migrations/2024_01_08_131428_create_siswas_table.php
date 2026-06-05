<?php

use App\Models\User;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Kelas::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Pendaftaran::class)->constrained()->cascadeOnDelete();
            $table->text('nama_panggilan')->nullable();
            $table->bigInteger('tinggi_badan')->nullable();
            $table->bigInteger('berat_badan')->nullable();
            $table->date('tanggal_pendaftaran')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katholik', 'hindu', 'budha', 'konghuchu'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->text('rt_rw')->nullable();
            $table->text('kode_pos')->nullable();
            $table->text('alamat_asal')->nullable();
            $table->text('kelurahan')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kota')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('no_telp')->nullable();
            $table->text('no_hp')->nullable();
            $table->text('alamat_email')->nullable();
            $table->enum('kegiatan_olahraga', ['Aktif', 'Cukup', 'Kurang'])->nullable();
            $table->enum('kegiatan_kesenian', ['Aktif', 'Cukup', 'Kurang'])->nullable();
            $table->text('prestasi')->nullable();
            $table->enum('status_tempat', ['rumah sendiri', 'kontrakan', 'kosan'])->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->bigInteger('nilai_ijazah')->nullable();
            $table->string('nisn')->nullable();
            $table->bigInteger('nilai_rata')->nullable();
            $table->enum('status', ['Menunggu Konfirmasi', 'Tidak Diterima', 'Diterima', 'Perbaiki Data', 'Perbaiki Dokumen'])->default('Menunggu Konfirmasi');
            $table->enum('pindahan', ['Ya', 'Tidak'])->default('Tidak');
            $table->boolean('is_save')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
