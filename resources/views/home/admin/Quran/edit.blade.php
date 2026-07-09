@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <style>
        .video-quran {
            width: 420px;
            max-width: 100%;
            height: 240px;
            border-radius: 8px;
            background: #000;
            border: 1px solid #ddd;
        }

        .info-box {
            border: 1px solid #dcdfe6;
            border-radius: 8px;
            padding: 15px;
            background: #f8f9fc;
        }

        .section-title {
            font-weight: 700;
            color: #009b4e;
            margin-bottom: 12px;
        }

        .nilai-box {
            background: #d9f7fb;
            border: 1px solid #9ee6ef;
            border-radius: 8px;
            padding: 15px;
        }
    </style>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">
                Nilai Tes Al-Qur'an
            </h4>
            <small class="text-muted">
                Berikan penilaian berdasarkan video bacaan Al-Qur’an siswa.
            </small>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.quran.update', $quranTest->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- KOLOM KIRI --}}
                    <div class="col-md-7">

                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $quranTest->user->name ?? '-' }}"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Tes</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $quranTest->test_date ? \Carbon\Carbon::parse($quranTest->test_date)->format('d-m-Y') : '-' }}"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label>Bacaan yang Dipilih</label>

                            <div class="info-box">
                                <p class="mb-1">
                                    <strong>Juz:</strong> {{ $quranTest->juz ?? '-' }}
                                </p>

                                <p class="mb-1">
                                    <strong>Surat:</strong> {{ $quranTest->surat ?? '-' }}
                                </p>

                                <p class="mb-1">
                                    <strong>Ayat:</strong> {{ $quranTest->ayat ?? '-' }}
                                </p>

                                @if(!empty($quranTest->keterangan_bacaan))
                                    <p class="mb-0">
                                        <strong>Keterangan:</strong> {{ $quranTest->keterangan_bacaan }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Video Bacaan</label>

                            @if($quranTest->video_path)
                                <div class="mb-2">
                                    <video class="video-quran" controls>
                                        <source src="{{ asset('storage/' . $quranTest->video_path) }}">
                                        Browser tidak mendukung video.
                                    </video>
                                </div>

                                <a href="{{ asset('storage/' . $quranTest->video_path) }}" target="_blank">
                                    Lihat / Download File
                                </a>
                            @else
                                <div class="alert alert-warning">
                                    Belum ada file video.
                                </div>
                            @endif
                        </div>

                    </div>

                    {{-- KOLOM KANAN --}}
                    <div class="col-md-5">

                        <div class="nilai-box mb-3">
                            <div class="section-title">
                                Komponen Penilaian yang Disarankan
                            </div>

                            <ul class="mb-0">
                                <li>Makhraj Huruf: 30%</li>
                                <li>Tajwid: 30%</li>
                                <li>Kelancaran Membaca: 25%</li>
                                <li>Adab Membaca: 15%</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Nilai Tes Al-Qur'an</label>
                            <input type="number"
                                   name="score"
                                   class="form-control @error('score') is-invalid @enderror"
                                   min="0"
                                   max="100"
                                   value="{{ old('score', $quranTest->score) }}"
                                   placeholder="Masukkan nilai 0-100"
                                   required>

                            @error('score')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Catatan Admin</label>
                            <textarea name="notes"
                                      class="form-control @error('notes') is-invalid @enderror"
                                      rows="6"
                                      placeholder="Contoh: Bacaan cukup lancar, tajwid perlu diperbaiki.">{{ old('notes', $quranTest->notes) }}</textarea>

                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="alert alert-light border">
                            <small>
                                Setelah nilai disimpan, status tes akan berubah menjadi
                                <strong>Sudah Dinilai</strong> dan nilai akan masuk ke data siswa.
                            </small>
                        </div>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.quran.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Nilai
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection