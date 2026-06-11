@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Data Wawancara</h3>

    <form action="{{ route('admin.interview.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Siswa</label>
            <select name="user_id" class="form-control" required>
                <option value="">Pilih Siswa</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Wawancara</label>
            <input type="date" name="interview_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" name="score" class="form-control" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum">Belum</option>
                <option value="lulus">Lulus</option>
                <option value="tidak_lulus">Tidak Lulus</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection