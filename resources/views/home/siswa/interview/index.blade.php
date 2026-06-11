@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: #f4f8f6; min-height: 100vh;">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow rounded-3 border-0">

                    {{-- Header --}}
                    <div class="card-header bg-success text-white text-center py-3 rounded-top">
                        <h5 class="mb-0 fw-bold">Informasi Wawancara</h5>
                    </div>

                    {{-- Body --}}
                    <div class="card-body p-4">

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Nama Siswa</small>
                            <span class="fw-bold">{{ $interview->user->name ?? auth()->user()->name }}</span>
                        </div>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Tanggal Wawancara</small>
                            <span class="fw-bold">
                                @if($interview->interview_date)
                                    {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}
                                @else
                                    Belum dijadwalkan
                                @endif
                            </span>
                        </div>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Status Wawancara</small>
                            @if($interview->status == 'belum')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif($interview->status == 'lulus')
                                <span class="badge bg-success">Lulus</span>
                            @elseif($interview->status == 'tidak_lulus')
                                <span class="badge bg-danger">Tidak Lulus</span>
                            @endif
                        </div>

                        <hr>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Nilai Wawancara</small>
                            @if($interview->score !== null && $interview->status != 'belum')
                                <input type="text" class="form-control" value="{{ $interview->score }}" readonly>
                            @else
                                <p class="text-muted mb-0">Belum dinilai</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Catatan Penguji</small>
                            @if($interview->notes && $interview->status != 'belum')
                                <div class="p-2 rounded" style="background-color: #d4f0e1; color:#004d3f;">
                                    {{ $interview->notes }}
                                </div>
                            @else
                                <p class="text-muted mb-0">Belum ada catatan dari penguji</p>
                            @endif
                        </div>

                    </div>

                    {{-- Footer --}}
                    <a href="{{ route('dashboard') }}" class="btn btn-success px-5 rounded">
                        Kembali
                    </a>

                </div>

            </div>
        </div>

    </div>
@endsection