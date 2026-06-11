@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Informasi Wawancara</h5>
                </div>

                <div class="card-body">

                    @if($interview)

                        <div class="mb-3">
                            <label class="fw-bold">Nama Siswa</label>
                            <p class="mb-0">
                                {{ $interview->user->name ?? auth()->user()->name }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Tanggal Wawancara</label>
                            <p class="mb-0">
                                @if($interview->interview_date)
                                    {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}
                                @else
                                    Belum dijadwalkan
                                @endif
                            </p>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Status Wawancara</label>
                            <p class="mb-0">
                                @if($interview->status == 'belum')
                                    <span class="badge bg-warning text-dark">
                                        Menunggu Wawancara
                                    </span>
                                @elseif($interview->status == 'lulus')
                                    <span class="badge bg-success">
                                        Lulus
                                    </span>
                                @elseif($interview->status == 'tidak_lulus')
                                    <span class="badge bg-danger">
                                        Tidak Lulus
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($interview->status) }}
                                    </span>
                                @endif
                            </p>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="fw-bold">Nilai Wawancara</label>

                            @if($interview->score !== null && $interview->status != 'belum')
                                <h4 class="mb-0">{{ $interview->score }}</h4>
                            @else
                                <p class="text-muted mb-0">Belum dinilai.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Catatan Penguji</label>

                            @if($interview->notes && $interview->status != 'belum')
                                <div class="alert alert-info mt-2 mb-0">
                                    {{ $interview->notes }}
                                </div>
                            @else
                                <p class="text-muted mb-0">Belum ada catatan dari penguji.</p>
                            @endif
                        </div>

                        @if($interview->status == 'belum')
                            <div class="alert alert-warning mt-4 mb-0">
                                Data wawancara kamu sudah terdaftar. Silakan tunggu proses wawancara atau informasi lebih lanjut dari admin.
                            </div>
                        @elseif($interview->status == 'lulus')
                            <div class="alert alert-success mt-4 mb-0">
                                Selamat, kamu dinyatakan lulus tahap wawancara.
                            </div>
                        @elseif($interview->status == 'tidak_lulus')
                            <div class="alert alert-danger mt-4 mb-0">
                                Kamu belum dinyatakan lulus tahap wawancara.
                            </div>
                        @endif

                    @else

                        <div class="text-center py-5">
                            <div style="font-size: 48px;">📝</div>
                            <h5 class="mt-3">Belum Ada Data Wawancara</h5>
                            <p class="text-muted">
                                Jadwal atau hasil wawancara kamu belum tersedia. Silakan tunggu informasi dari admin.
                            </p>
                        </div>

                    @endif

                </div>

                <div class="card-footer text-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection