@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0 text-success font-weight-bold">
                        Data Tes Al-Qur'an
                    </h4>
                    <small class="text-muted">
                        Kelola video tes membaca Al-Qur'an, nilai, dan catatan siswa.
                    </small>
                </div>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="alert alert-info">
                    <strong>Petunjuk Penilaian:</strong>
                    <ul class="mb-0 mt-2">
                        <li>Admin dapat melihat video bacaan Al-Qur'an yang diunggah siswa.</li>
                        <li>Penilaian dapat berdasarkan makhraj huruf, tajwid, kelancaran, dan adab membaca.</li>
                        <li>Nilai yang disimpan akan masuk sebagai nilai Tes Al-Qur'an siswa.</li>
                    </ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Tes</th>
                                <th>Bacaan</th>
                                <th>Video</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th width="12%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($tests as $index => $test)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        {{ $test->user->name ?? '-' }}
                                    </td>

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
                                        @if($test->video_url)
                                            @php
                                                $videoId = null;

                                                if (str_contains($test->video_url, 'youtube.com/watch?v=')) {
                                                    parse_str(parse_url($test->video_url, PHP_URL_QUERY), $query);
                                                    $videoId = $query['v'] ?? null;
                                                } elseif (str_contains($test->video_url, 'youtu.be/')) {
                                                    $videoId = trim(parse_url($test->video_url, PHP_URL_PATH), '/');
                                                }
                                            @endphp

                                            @if($videoId)
                                                <div style="width: 320px; max-width: 100%;">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item"
                                                            src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-danger">
                                                    Link YouTube tidak valid
                                                </span>
                                            @endif
                                        @else
                                            <span class="text-muted">
                                                Belum ada link video
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($test->score !== null)
                                            <span class="badge badge-success">
                                                {{ $test->score }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
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

                                    <td>
                                        <a href="{{ route('admin.quran.edit', $test->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.quran.destroy', $test->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data tes Qur’an ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">
                                        Belum ada data tes Al-Qur'an yang diunggah siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection