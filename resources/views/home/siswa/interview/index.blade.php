@extends('layouts.app', ['title' => 'Seleksi Wawancara'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Seleksi Wawancara
            </h6>
        </div>

        <div class="card-body">

            @if (!$interview)

                <div class="alert alert-warning">
                    Jadwal wawancara belum tersedia. Silakan menunggu informasi dari panitia PPDB.
                </div>

            @else

                {{-- ALERT HANYA MUNCUL KALAU SUDAH ADA HASIL --}}
                @if ($interview->status == 'lulus')
                    <div class="alert alert-success">
                        Selamat! Anda dinyatakan <strong>LULUS</strong> pada tahap wawancara.
                    </div>
                @elseif ($interview->status == 'tidak_lulus')
                    <div class="alert alert-danger">
                        Mohon maaf, Anda dinyatakan <strong>TIDAK LULUS</strong> pada tahap wawancara.
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <td width="230">Nama Siswa</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>

                    <tr>
                        <td>Jenis Wawancara</td>
                        <td>
                            @if ($interview->interview_type == 'online')
                                <span class="badge badge-primary">
                                    Online / Google Meet
                                </span>
                            @elseif ($interview->interview_type == 'offline')
                                <span class="badge badge-success">
                                    Offline / Tatap Muka
                                </span>
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Tanggal Wawancara</td>
                        <td>
                            {{ $interview->interview_date ? \Carbon\Carbon::parse($interview->interview_date)->format('d-m-Y') : '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td>Jam Wawancara</td>
                        <td>
                            {{ $interview->interview_time ? \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '-' }}
                        </td>
                    </tr>

                    @if ($interview->interview_type == 'online')
                        <tr>
                            <td>Link Google Meet</td>
                            <td>
                                @if ($interview->meeting_link)
                                    <a href="{{ $interview->meeting_link }}"
                                       target="_blank"
                                       class="btn btn-sm btn-primary">
                                        Masuk Google Meet
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endif

                    @if ($interview->interview_type == 'offline')
                        <tr>
                            <td>Tempat Wawancara</td>
                            <td>
                                {{ $interview->interview_place ?? '-' }}
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($interview->status == 'lulus')
                                <span class="badge badge-success">
                                    Lulus
                                </span>
                            @elseif ($interview->status == 'tidak_lulus')
                                <span class="badge badge-danger">
                                    Tidak Lulus
                                </span>
                            @elseif ($interview->status == 'terjadwal')
                                <span class="badge badge-info">
                                    Terjadwal
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Belum Diproses
                                </span>
                            @endif
                        </td>
                    </tr>

                    @if($interview->status == 'lulus' || $interview->status == 'tidak_lulus')
                        <tr>
                            <td>Nilai Wawancara</td>
                            <td>
                                {{ $interview->score ?? '-' }}
                            </td>
                        </tr>

                        @if(!empty($interview->notes))
                            <tr>
                                <td>Catatan Panitia</td>
                                <td>
                                    {{ $interview->notes }}
                                </td>
                            </tr>
                        @endif
                    @endif
                </table>

            @endif

        </div>
    </div>
@endsection