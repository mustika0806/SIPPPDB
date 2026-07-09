@extends('layouts.app')

@section('title', 'Tambah Tes Quran Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header">
            <h4 class="mb-0 text-success">Tambah Tes Al-Qur'an</h4>
            <small class="text-muted">
                Admin dapat menambahkan data tes membaca Al-Qur'an siswa.
            </small>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.quran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('user_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Tes</label>
                    <input type="date"
                           name="test_date"
                           class="form-control @error('test_date') is-invalid @enderror"
                           value="{{ old('test_date') }}"
                           required>

                    @error('test_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Juz yang Dibaca</label>
                    <select name="juz" class="form-control @error('juz') is-invalid @enderror">
                        <option value="">-- Pilih Juz --</option>
                        @for($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}" {{ old('juz') == $i ? 'selected' : '' }}>
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

                <div class="form-group">
                    <label>Nama Surat</label>
                    <input type="text"
                           name="surat"
                           class="form-control @error('surat') is-invalid @enderror"
                           placeholder="Contoh: An-Nisa"
                           value="{{ old('surat') }}">

                    @error('surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Ayat yang Dibaca</label>
                    <input type="text"
                           name="ayat"
                           class="form-control @error('ayat') is-invalid @enderror"
                           placeholder="Contoh: 1-10"
                           value="{{ old('ayat') }}">

                    @error('ayat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Keterangan Bacaan</label>
                    <textarea name="keterangan_bacaan"
                              class="form-control @error('keterangan_bacaan') is-invalid @enderror"
                              rows="3"
                              placeholder="Contoh: Membaca 1 halaman dari surat An-Nisa">{{ old('keterangan_bacaan') }}</textarea>

                    @error('keterangan_bacaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Upload Video</label>
                    <input type="file"
                           name="video"
                           class="form-control @error('video') is-invalid @enderror"
                           accept=".mp4,.mov,.webm"
                           required>

                    <small class="text-muted">
                        Format: mp4, mov, webm. Maksimal 50 MB.
                    </small>

                    @error('video')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.quran.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection