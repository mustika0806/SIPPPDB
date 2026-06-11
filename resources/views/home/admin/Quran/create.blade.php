@extends('layouts.app')

@section('title', 'Tambah Tes Quran Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header">
            <h4 class="mb-0 text-success">Tambah Tes Al-Qur'an</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.quran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Tes</label>
                    <input type="date" name="test_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Upload Video/Audio</label>
                    <input type="file" name="video" class="form-control" accept=".mp4,.mov,.webm,.mp3,.wav" required>
                    <small class="text-muted">Format: mp4, mov, webm, mp3, wav. Maksimal 50 MB</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.quran.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection