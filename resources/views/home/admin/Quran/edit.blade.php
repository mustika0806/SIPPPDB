@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <style>
        .video-quran {
            width: 100%;
            max-width: 100%;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
            background: #000;
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
                    <div class="col-lg-7 col-md-12 mb-4">

                        <div class="form-group">
                            <label>Nama Siswa</label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $quranTest->user->name ?? '-' }}"
                                readonly
                            >
                        </div>

                        <div class="form-group">
                            <label>Tanggal Tes</label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $quranTest->test_date ? \Carbon\Carbon::parse($quranTest->test_date)->format('d-m-Y') : '-' }}"
                                readonly
                            >
                        </div>

                        <div class="form-group">
                            <label>Bacaan yang Dipilih</label>

                            <div class="info-box">
                                <p class="mb-1">
                                    <strong>Juz:</strong>
                                    {{ $quranTest->juz ?? '-' }}
                                </p>

                                <p class="mb-1">
                                    <strong>Surat:</strong>
                                    {{ $quranTest->surat ?? '-' }}
                                </p>

                                <p class="mb-1">
                                    <strong>Ayat:</strong>
                                    {{ $quranTest->ayat ?? '-' }}
                                </p>

                                @if(!empty($quranTest->keterangan_bacaan))
                                    <p class="mb-0">
                                        <strong>Keterangan:</strong>
                                        {{ $quranTest->keterangan_bacaan }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Video Bacaan</label>

                            @php
                                $videoId = null;
                                $videoUrl = $quranTest->video_url ?? null;

                                if ($videoUrl) {

                                    if (str_contains($videoUrl, 'youtube.com/watch?v=')) {

                                        parse_str(
                                            parse_url($videoUrl, PHP_URL_QUERY),
                                            $query
                                        );

                                        $videoId = $query['v'] ?? null;

                                    } elseif (str_contains($videoUrl, 'youtu.be/')) {

                                        $videoId = trim(
                                            parse_url($videoUrl, PHP_URL_PATH),
                                            '/'
                                        );

                                    } elseif (str_contains($videoUrl, 'youtube.com/shorts/')) {

                                        $path = trim(
                                            parse_url($videoUrl, PHP_URL_PATH),
                                            '/'
                                        );

                                        $parts = explode('/', $path);

                                        $videoId = $parts[1] ?? null;

                                    } elseif (str_contains($videoUrl, 'youtube.com/embed/')) {

                                        $path = trim(
                                            parse_url($videoUrl, PHP_URL_PATH),
                                            '/'
                                        );

                                        $parts = explode('/', $path);

                                        $videoId = $parts[1] ?? null;
                                    }
                                }
                            @endphp

                            @if($videoId)

                                <div class="video-quran">
                                    <div class="embed-responsive embed-responsive-16by9">

                                        <iframe
                                            class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/{{ $videoId }}"
                                            title="Video Tes Al-Qur'an"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>

                                    </div>
                                </div>

                            @elseif($videoUrl)

                                <div class="alert alert-danger mb-0">
                                    Link YouTube tidak valid.
                                </div>

                            @else

                                <div class="alert alert-warning mb-0">
                                    Siswa belum mengirim link video.
                                </div>

                            @endif
                        </div>

                    </div>


                    {{-- KOLOM KANAN --}}
                    <div class="col-lg-5 col-md-12 mb-4">

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

                            <label>
                                Nilai Tes Al-Qur'an
                            </label>

                            <input
                                type="number"
                                name="score"
                                class="form-control @error('score') is-invalid @enderror"
                                min="0"
                                max="100"
                                value="{{ old('score', $quranTest->score) }}"
                                placeholder="Masukkan nilai 0-100"
                                required
                            >

                            @error('score')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>
                                Catatan Admin
                            </label>

                            <textarea
                                name="notes"
                                class="form-control @error('notes') is-invalid @enderror"
                                rows="6"
                                placeholder="Contoh: Bacaan cukup lancar, tajwid perlu diperbaiki."
                            >{{ old('notes', $quranTest->notes) }}</textarea>

                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="alert alert-light border">
                            <small>
                                Setelah nilai disimpan, status tes akan berubah menjadi
                                <strong>Sudah Dinilai</strong>
                                dan nilai akan masuk ke data siswa.
                            </small>
                        </div>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('admin.quran.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Simpan Nilai
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection