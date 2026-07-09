@extends('layouts.app')

@section('title', 'Tes Quran Siswa')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-success">
                Tes Quran Saya
            </h4>

            <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                Upload Video
            </button>
        </div>

        <div class="card-body">

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pesan error --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Ketentuan Upload --}}
            <div class="alert alert-info">
                <h6 class="font-weight-bold mb-2">
                    Ketentuan Upload Tes Membaca Al-Qur’an
                </h6>

                <p class="mb-2">
                    Calon siswa wajib mengunggah video membaca Al-Qur’an sebagai bagian dari proses seleksi.
                    Bacaan boleh dipilih secara bebas dari Juz 1 sampai Juz 30.
                </p>

                <ol class="mb-2">
                    <li>Bacaan minimal 1 halaman mushaf Al-Qur’an.</li>
                    <li>Jika memilih surat pendek, minimal membaca 10–15 ayat.</li>
                    <li>Durasi video sekitar 2–5 menit.</li>
                    <li>Suara harus jelas dan wajah terlihat.</li>
                    <li>Video tidak boleh diedit.</li>
                    <li>Sebelum membaca, calon siswa menyebutkan nama lengkap dan nomor pendaftaran.</li>
                    <li>Format video MP4 dengan ukuran maksimal 50 MB.</li>
                </ol>

                <hr>

                <h6 class="font-weight-bold mb-2">
                    Data yang Harus Diisi
                </h6>

                <ul class="mb-0">
                    <li>Juz yang dibaca.</li>
                    <li>Nama surat.</li>
                    <li>Ayat yang dibaca.</li>
                    <li>Video membaca Al-Qur’an.</li>
                </ul>
            </div>

            {{-- Tabel Tes Quran --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal Tes</th>
                            <th>Bacaan</th>
                            <th>Video</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($tests as $index => $test)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $test->test_date ? \Carbon\Carbon::parse($test->test_date)->format('d-m-Y') : '-' }}
                                </td>

                                <td>
                                    <strong>Juz:</strong> {{ $test->juz ?? '-' }} <br>
                                    <strong>Surat:</strong> {{ $test->surat ?? '-' }} <br>
                                    <strong>Ayat:</strong> {{ $test->ayat ?? '-' }}

                                    @if(!empty($test->keterangan_bacaan))
                                        <br>
                                        <small class="text-muted">
                                            {{ $test->keterangan_bacaan }}
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    @if ($test->video_path)
                                        <video width="220" height="150" controls>
                                            <source src="{{ asset('storage/' . $test->video_path) }}">
                                            Browser tidak mendukung video.
                                        </video>
                                    @else
                                        <span class="text-muted">Belum ada video</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $test->score ?? '-' }}
                                </td>

                                <td>
                                    @if(($test->status ?? '') == 'Sudah Dinilai')
                                        <span class="badge badge-success">
                                            Sudah Dinilai
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            Menunggu Penilaian
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $test->notes ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada tes yang diunggah
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- Modal Upload --}}
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('siswa.tes.quran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="uploadModalLabel">
                        Upload Tes Membaca Al-Qur’an
                    </h5>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="alert alert-warning">
                        Bacaan bebas dari Juz 1–30. Minimal membaca 1 halaman mushaf atau 10–15 ayat untuk surat pendek.
                    </div>

                    <div class="form-group">
                        <label>Tanggal Tes</label>
                        <input type="date"
                               name="test_date"
                               class="form-control @error('test_date') is-invalid @enderror"
                               value="{{ old('test_date', date('Y-m-d')) }}"
                               required>

                        @error('test_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Juz yang Dibaca</label>
                        <select name="juz"
                                class="form-control @error('juz') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Juz --</option>

                            @for($i = 1; $i <= 30; $i++)
                                <option value="{{ $i }}" {{ old('juz') == $i ? 'selected' : '' }}>
                                    Juz {{ $i }}
                                </option>
                            @endfor
                        </select>

                        @error('juz')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Surat</label>
                        <input type="text"
                               name="surat"
                               class="form-control @error('surat') is-invalid @enderror"
                               placeholder="Contoh: Al-Baqarah, Yasin, Al-Mulk"
                               value="{{ old('surat') }}"
                               required>

                        @error('surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Ayat yang Dibaca</label>
                        <input type="text"
                               name="ayat"
                               class="form-control @error('ayat') is-invalid @enderror"
                               placeholder="Contoh: 1-10"
                               value="{{ old('ayat') }}"
                               required>

                        @error('ayat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan Bacaan</label>
                        <textarea name="keterangan_bacaan"
                                  class="form-control @error('keterangan_bacaan') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Contoh: Membaca 1 halaman dari Surah Al-Baqarah">{{ old('keterangan_bacaan') }}</textarea>

                        @error('keterangan_bacaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Upload Video Membaca Al-Qur’an</label>
                        <input type="file"
                               name="video_path"
                               class="form-control @error('video_path') is-invalid @enderror"
                               accept=".mp4"
                               required>

                        <small class="text-muted">
                            Format: MP4. Maksimal 50 MB.
                        </small>

                        @error('video_path')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-success">
                        Unggah
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection