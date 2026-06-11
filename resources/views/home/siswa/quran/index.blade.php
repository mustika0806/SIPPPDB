@extends('layouts.app')

@section('title', 'Tes Quran Siswa')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-success">Tes Quran Saya</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload Video</button>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Tes</th>
                        <th>Video</th>
                        <th>Nilai</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tests as $index => $test)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $test->test_date }}</td>
                        <td>
                            @if($test->video_path)
                                <video width="200" height="150" controls>
                                    <source src="{{ asset('storage/'.$test->video_path) }}" type="video/mp4">
                                </video>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $test->score ?? '-' }}</td>
                        <td>{{ $test->notes ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada tes yang diunggah</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('siswa.tes.quran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Tes Quran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Tes</label>
                        <input type="date" name="test_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Upload Video/Audio</label>
                        <input type="file" name="video" class="form-control" accept=".mp4,.mov,.webm,.mp3,.wav" required>
                        <small class="text-muted">Format: mp4, mov, webm, mp3, wav. Maksimal 50 MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Unggah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection