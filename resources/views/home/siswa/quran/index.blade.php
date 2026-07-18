@extends('layouts.app')

@section('title', 'Tes Quran Siswa')

@section('content')
<style>
    .quran-page {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow-x: hidden;
        box-sizing: border-box;
    }

    .quran-page,
    .quran-page * {
        box-sizing: border-box;
    }

    .quran-main-card {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow: hidden;
    }

    .quran-access-lock {
        width: 100%;
        max-width: 100%;
        min-height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
        box-sizing: border-box;
    }

    .quran-access-lock-box {
        width: 100%;
        max-width: 570px;
        padding: 42px 35px;
        text-align: center;
        background: #ffffff;
        border: 1px solid #e1e7ef;
        border-radius: 16px;
        box-shadow: 0 10px 28px rgba(43, 54, 87, 0.08);
    }

    .quran-access-lock-icon {
        display: flex;
        width: 72px;
        height: 72px;
        margin: 0 auto 22px;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        background: linear-gradient(135deg, #f4a62a, #ffbd45);
        border-radius: 50%;
        box-shadow: 0 8px 20px rgba(244, 166, 42, 0.25);
        font-size: 29px;
    }

    .quran-access-lock-title {
        margin: 0 0 10px;
        color: #26304a;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.35;
    }

    .quran-access-lock-text {
        margin: 0;
        color: #85899a;
        font-size: 15px;
        line-height: 1.6;
    }

    .quran-table {
        min-width: 900px;
        margin-bottom: 0;
    }

    .quran-video {
        width: 220px;
        max-width: 100%;
        height: 150px;
        object-fit: contain;
        background: #000000;
        border-radius: 6px;
    }

    @media (max-width: 767.98px) {
        .quran-page {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }

        .quran-card-header {
            align-items: flex-start !important;
            flex-direction: column;
        }

        .quran-card-header .btn {
            margin-top: 12px;
        }

        .quran-access-lock {
            min-height: 330px;
            padding: 20px 5px;
        }

        .quran-access-lock-box {
            padding: 35px 22px;
        }

        .quran-access-lock-title {
            font-size: 21px;
        }

        .quran-access-lock-text {
            font-size: 14px;
        }
    }
</style>

<div class="container-fluid quran-page px-3">

    <div class="card shadow-sm border-0 quran-main-card">

        <div class="card-header d-flex justify-content-between align-items-center quran-card-header">

            <h4 class="mb-0 text-success">
                Tes Quran Saya
            </h4>

            @if($aksesTesQuran)
                <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#uploadModal"
                >
                    <i class="fas fa-upload mr-1"></i>
                    Upload Video
                </button>
            @endif

        </div>

        <div class="card-body">

            @if(!$aksesTesQuran)

                {{-- Halaman terkunci --}}
                <div class="quran-access-lock">

                    <div class="quran-access-lock-box">

                        <div class="quran-access-lock-icon">
                            <i class="fas fa-lock"></i>
                        </div>

                        <h3 class="quran-access-lock-title">
                            Anda Belum Mendapatkan Akses
                        </h3>

                        <p class="quran-access-lock-text">
                            Tahap Seleksi Tes Quran belum tersedia.
                        </p>

                    </div>

                </div>

            @else

                {{-- Pesan sukses --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan gagal --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Ketentuan upload --}}
                <div class="alert alert-info">

                    <h6 class="font-weight-bold mb-2">
                        Ketentuan Upload Tes Membaca Al-Quran
                    </h6>

                    <p class="mb-2">
                        Calon siswa wajib mengunggah video membaca Al-Quran
                        sebagai bagian dari proses seleksi. Bacaan boleh
                        dipilih secara bebas dari Juz 1 sampai Juz 30.
                    </p>

                    <ol class="mb-0">
                        <li>
                            Bacaan minimal 1 halaman mushaf Al-Quran.
                        </li>

                        <li>
                            Jika memilih surat pendek, minimal membaca
                            10–15 ayat.
                        </li>

                        <li>
                            Durasi video sekitar 2–5 menit.
                        </li>

                        <li>
                            Suara harus jelas dan wajah terlihat.
                        </li>

                        <li>
                            Video tidak boleh diedit.
                        </li>

                        <li>
                            Sebelum membaca, calon siswa menyebutkan nama
                            lengkap dan nomor pendaftaran.
                        </li>

                        <li>
                            Format video MP4 dengan ukuran maksimal 50 MB.
                        </li>
                    </ol>

                </div>

                {{-- Tabel Tes Quran --}}
                <div class="table-responsive">

                    <table class="table table-bordered table-hover quran-table">

                        <thead class="thead-light">
                            <tr>
                                <th width="5%" class="text-center">
                                    No
                                </th>

                                <th>
                                    Tanggal Tes
                                </th>

                                <th>
                                    Bacaan
                                </th>

                                <th>
                                    Video
                                </th>

                                <th class="text-center">
                                    Nilai
                                </th>

                                <th class="text-center">
                                    Status
                                </th>

                                <th>
                                    Catatan
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($tests as $index => $test)

                                <tr>
                                    <td class="text-center">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        @if($test->test_date)
                                            {{ \Carbon\Carbon::parse(
                                                $test->test_date
                                            )->format('d-m-Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <strong>Juz:</strong>
                                        {{ $test->juz ?? '-' }}

                                        <br>

                                        <strong>Surat:</strong>
                                        {{ $test->surat ?? '-' }}

                                        <br>

                                        <strong>Ayat:</strong>
                                        {{ $test->ayat ?? '-' }}

                                        @if(!empty($test->keterangan_bacaan))
                                            <br>

                                            <small class="text-muted">
                                                {{ $test->keterangan_bacaan }}
                                            </small>
                                        @endif
                                    </td>

                                    <td>
                                        @if($test->video_path)
                                            <video
                                                class="quran-video"
                                                controls
                                            >
                                                <source
                                                    src="{{ asset(
                                                        'storage/' .
                                                        $test->video_path
                                                    ) }}"
                                                    type="video/mp4"
                                                >

                                                Browser tidak mendukung video.
                                            </video>
                                        @else
                                            <span class="text-muted">
                                                Belum ada video
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        {{ $test->score ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if(
                                            ($test->status ?? '') ===
                                            'Sudah Dinilai'
                                        )
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
                                    <td
                                        colspan="7"
                                        class="text-center text-muted"
                                    >
                                        Belum ada Tes Quran yang diunggah.
                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>

</div>

{{-- Modal hanya tersedia jika Tes Quran sudah dibuka --}}
@if($aksesTesQuran)

    <div
        class="modal fade"
        id="uploadModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="uploadModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg" role="document">

            <form
                action="{{ route('siswa.tes.quran.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="modal-content">

                    <div class="modal-header bg-success text-white">

                        <h5
                            class="modal-title"
                            id="uploadModalLabel"
                        >
                            Upload Tes Membaca Al-Quran
                        </h5>

                        <button
                            type="button"
                            class="close text-white"
                            data-dismiss="modal"
                            aria-label="Tutup"
                        >
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="alert alert-warning">
                            Bacaan bebas dari Juz 1–30. Minimal membaca
                            1 halaman mushaf atau 10–15 ayat untuk surat
                            pendek.
                        </div>

                        {{-- Tanggal Tes --}}
                        <div class="form-group">

                            <label for="test_date">
                                Tanggal Tes
                            </label>

                            <input
                                type="date"
                                id="test_date"
                                name="test_date"
                                class="form-control
                                    @error('test_date') is-invalid @enderror"
                                value="{{ old(
                                    'test_date',
                                    date('Y-m-d')
                                ) }}"
                                required
                            >

                            @error('test_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Juz --}}
                        <div class="form-group">

                            <label for="juz">
                                Juz yang Dibaca
                            </label>

                            <select
                                id="juz"
                                name="juz"
                                class="form-control
                                    @error('juz') is-invalid @enderror"
                                required
                            >
                                <option value="">
                                    -- Pilih Juz --
                                </option>

                                @for($i = 1; $i <= 30; $i++)
                                    <option
                                        value="{{ $i }}"
                                        {{ old('juz') == $i
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
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

                        {{-- Nama Surat --}}
                        <div class="form-group">

                            <label for="surat">
                                Nama Surat
                            </label>

                            <input
                                type="text"
                                id="surat"
                                name="surat"
                                class="form-control
                                    @error('surat') is-invalid @enderror"
                                placeholder="Contoh: Al-Baqarah, Yasin, Al-Mulk"
                                value="{{ old('surat') }}"
                                required
                            >

                            @error('surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Ayat --}}
                        <div class="form-group">

                            <label for="ayat">
                                Ayat yang Dibaca
                            </label>

                            <input
                                type="text"
                                id="ayat"
                                name="ayat"
                                class="form-control
                                    @error('ayat') is-invalid @enderror"
                                placeholder="Contoh: 1-10"
                                value="{{ old('ayat') }}"
                                required
                            >

                            @error('ayat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Keterangan Bacaan --}}
                        <div class="form-group">

                            <label for="keterangan_bacaan">
                                Keterangan Bacaan
                            </label>

                            <textarea
                                id="keterangan_bacaan"
                                name="keterangan_bacaan"
                                class="form-control
                                    @error('keterangan_bacaan') is-invalid @enderror"
                                rows="3"
                                placeholder="Contoh: Membaca 1 halaman dari Surah Al-Baqarah"
                            >{{ old('keterangan_bacaan') }}</textarea>

                            @error('keterangan_bacaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Upload video --}}
                        <div class="form-group">

                            <label for="video_path">
                                Upload Video Membaca Al-Quran
                            </label>

                            <input
                                type="file"
                                id="video_path"
                                name="video_path"
                                class="form-control
                                    @error('video_path') is-invalid @enderror"
                                accept=".mp4,video/mp4"
                                required
                            >

                            <small class="form-text text-muted">
                                Format MP4 dengan ukuran maksimal 50 MB.
                            </small>

                            @error('video_path')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            <i class="fas fa-upload mr-1"></i>
                            Unggah Video
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>

@endif
@endsection