@extends('layouts.app')

@section('title', 'Tambah Tes Quran Video')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">Tambah Data Tes Al-Qur'an (Video)</h4>
            <small class="text-muted">Input rekaman video bacaan calon peserta didik</small>
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
                    <label>Upload Rekaman Video</label>
                    <input type="file" name="video" class="form-control" accept=".mp4,.mov,.webm" required>
                    <small class="text-muted">Format: mp4, mov, webm. Maksimal 50 MB.</small>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('admin.quran.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection