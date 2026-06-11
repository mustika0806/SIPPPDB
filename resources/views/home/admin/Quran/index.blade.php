@extends('layouts.app')

@section('title', 'Data Tes Quran Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-success">Data Tes Al-Qur'an (Video)</h4>
            
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Tes</th>
                        <th>Video</th>
                        <th>Nilai</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tests as $index => $test)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $test->user->name }}</td>
                        <td>{{ $test->test_date }}</td>
                        <td>
                            @if($test->video_path)
                                <video width="200" height="150" controls>
                                    <source src="{{ asset('storage/'.$test->video_path) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $test->score ?? '-' }}</td>
                        <td>{{ $test->notes ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.quran.edit', $test->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('admin.quran.destroy', $test->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data tes video/audio</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection