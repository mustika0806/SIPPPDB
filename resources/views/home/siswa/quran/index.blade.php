@extends('layouts.app')

@section('title', 'Tes Al-Qur\'an Siswa')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">Upload Tes Al-Qur'an</h4>
            <small class="text-muted">Unggah rekaman video bacaan Al-Qur'an Anda</small>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.tes.quran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Tanggal Tes</label>
                    <input type="date" name="test_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Upload Rekaman Video</label>
                    <input type="file" name="video" class="form-control" accept=".mp4,.mov,.webm" required>
                    <small class="text-muted">Format: mp4, mov, webm. Maksimal 50 MB.</small>
                </div>

                <button type="submit" class="btn btn-success">Kirim Video</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0 text-success font-weight-bold">Riwayat Tes Saya</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Tes</th>
                        <th>Video</th>
                        <th>Nilai</th>
                        <th>Catatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tests as $index => $test)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $test->test_date }}</td>
                        <td>
                            @if($test->video_path)
                                <video width="200" controls>
                                    <source src="{{ asset('storage/' . $test->video_path) }}">
                                    Browser Anda tidak mendukung video.
                                </video>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $test->score ?? '-' }}</td>
                        <td>{{ $test->notes ?? '-' }}</td>
                        <td>
                            @if($test->score)
                                <span class="badge badge-success">Sudah Dinilai</span>
                            @else
                                <span class="badge badge-warning">Menunggu Penilaian</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada video tes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection