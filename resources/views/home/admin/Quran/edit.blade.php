@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">Nilai Tes Al-Qur'an</h4>
            <small class="text-muted">Berikan nilai dan catatan hasil tes membaca Al-Qur'an</small>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.quran.update', $quranTest->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" value="{{ $quranTest->user->name ?? '-' }}" readonly>
                </div>

                <div class="form-group">
                    <label>Tanggal Tes</label>
                    <input type="text" class="form-control"
                        value="{{ $quranTest->test_date ? \Carbon\Carbon::parse($quranTest->test_date)->format('d-m-Y') : '-' }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Rekaman Bacaan</label><br>
                    @if($quranTest->files->count() > 0)
                        <audio controls style="width: 300px;">
                            <source src="{{ asset('storage/' . $quranTest->files->first()->file_path) }}">
                            Browser tidak mendukung audio.
                        </audio>
                    @else
                        <span class="badge badge-secondary">Tidak ada file rekaman</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nilai</label>
                    <input type="number" name="score" class="form-control" min="0" max="100"
                        value="{{ old('score', $quranTest->score) }}" required>
                </div>

                <div class="form-group">
                    <label>Catatan</label>
                    <textarea name="notes" class="form-control" rows="4">{{ old('notes', $quranTest->notes) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.quran.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Nilai
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection