@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">
                <i class="fas fa-bullhorn"></i>
                Pengumuman Hasil Seleksi
            </h4>
        </div>

        <div class="card-body">

            @if(!$siswa)

                <div class="alert alert-warning">
                    Data siswa tidak ditemukan.
                </div>

            @elseif($siswa->total_nilai === null)

                <div class="alert alert-warning">
                    Pengumuman hasil seleksi belum tersedia.
                    Silakan menunggu proses penilaian dari pihak sekolah.
                </div>

            @elseif($siswa->status == 'Diterima')

                <div class="alert alert-success">
                    <h3>🎉 SELAMAT</h3>
                    <h5>
                        Anda dinyatakan <strong>DITERIMA</strong>
                    </h5>

                    <hr>

                    <p class="mb-0">
                        Selamat, Anda dinyatakan diterima sebagai calon siswa baru.
                        Silakan melakukan daftar ulang secara langsung di sekolah sesuai informasi berikut.
                    </p>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Informasi Hasil Seleksi
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama Siswa</th>
                                <td>{{ $siswa->user->name ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Jurusan</th>
                                <td>{{ $siswa->kelas->nama_jurusan ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Raport</th>
                                <td>{{ $siswa->nilai_rata ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Tes Al-Qur'an</th>
                                <td>{{ $siswa->nilai_quran ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Wawancara</th>
                                <td>{{ $siswa->nilai_wawancara ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Total Nilai</th>
                                <td>
                                    <strong>
                                        {{ $siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-' }}
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <th>Status Seleksi</th>
                                <td>
                                    <span class="badge badge-success">
                                        Diterima
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                        Informasi Daftar Ulang di Sekolah
                    </div>

                    <div class="card-body">

                        <p>
                            Proses daftar ulang tidak dilakukan melalui sistem,
                            tetapi dilakukan secara langsung di sekolah.
                        </p>

                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Jadwal Daftar Ulang</th>
                                <td>{{ $siswa->jadwal_daftar_ulang ?? 'Belum ditentukan' }}</td>
                            </tr>

                            <tr>
                                <th>Tempat Daftar Ulang</th>
                                <td>{{ $siswa->tempat_daftar_ulang ?? 'Ruang Tata Usaha Sekolah' }}</td>
                            </tr>
                        </table>

                        <h6 class="font-weight-bold">Berkas yang perlu dibawa:</h6>

                        <ul>
                            <li>Fotokopi Kartu Keluarga</li>
                            <li>Fotokopi Akta Kelahiran</li>
                            <li>Fotokopi rapor terakhir</li>
                            <li>Pas foto 3x4</li>
                            <li>Bukti pembayaran formulir</li>
                            <li>Dokumen pendukung lainnya</li>
                        </ul>

                        @if($siswa->catatan_admin)
                            <div class="alert alert-secondary mt-3">
                                <strong>Catatan Admin:</strong>
                                <br>
                                {{ $siswa->catatan_admin }}
                            </div>
                        @endif

                    </div>
                </div>

            @elseif($siswa->status == 'Tidak Diterima')

                <div class="alert alert-danger">
                    <h3>Mohon Maaf</h3>

                    <p class="mb-0">
                        Anda belum dinyatakan diterima.
                        Terima kasih telah mengikuti seluruh proses seleksi.
                    </p>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-danger text-white">
                        Detail Nilai Seleksi
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama Siswa</th>
                                <td>{{ $siswa->user->name ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Jurusan</th>
                                <td>{{ $siswa->kelas->nama_jurusan ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Raport</th>
                                <td>{{ $siswa->nilai_rata ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Tes Al-Qur'an</th>
                                <td>{{ $siswa->nilai_quran ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Nilai Wawancara</th>
                                <td>{{ $siswa->nilai_wawancara ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Total Nilai</th>
                                <td>
                                    <strong>
                                        {{ $siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-' }}
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <th>Status Seleksi</th>
                                <td>
                                    <span class="badge badge-danger">
                                        Tidak Diterima
                                    </span>
                                </td>
                            </tr>
                        </table>

                        @if($siswa->catatan_admin)
                            <div class="alert alert-secondary mt-3">
                                <strong>Catatan Admin:</strong>
                                <br>
                                {{ $siswa->catatan_admin }}
                            </div>
                        @endif
                    </div>
                </div>

            @else

                <div class="alert alert-warning">
                    Pengumuman hasil seleksi belum tersedia.
                </div>

            @endif

        </div>

    </div>

</div>

@endsection