@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Edit Data Wawancara</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.interview.update', $interview) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Siswa --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Siswa</label>
                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="">Pilih Siswa</option>

                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('user_id', $interview->user_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal Wawancara --}}
                <div class="mb-3">
                    <label for="interview_date" class="form-label">Tanggal Wawancara</label>
                    <input type="date"
                           name="interview_date"
                           id="interview_date"
                           class="form-control @error('interview_date') is-invalid @enderror"
                           value="{{ old('interview_date', $interview->interview_date) }}"
                           required>

                    @error('interview_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="">Pilih Status</option>
                        <option value="pending" {{ old('status', $interview->status) == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="lulus" {{ old('status', $interview->status) == 'lulus' ? 'selected' : '' }}>
                            Lulus
                        </option>
                        <option value="tidak_lulus" {{ old('status', $interview->status) == 'tidak_lulus' ? 'selected' : '' }}>
                            Tidak Lulus
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nilai --}}
                <div class="mb-3">
                    <label for="score" class="form-label">Nilai Wawancara</label>
                    <input type="number"
                           name="score"
                           id="score"
                           class="form-control @error('score') is-invalid @enderror"
                           value="{{ old('score', $interview->score) }}"
                           min="0"
                           max="100">

                    @error('score')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Catatan --}}
                <div class="mb-3">
                    <label for="notes" class="form-label">Catatan Wawancara</label>
                    <textarea name="notes"
                              id="notes"
                              rows="5"
                              class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $interview->notes) }}</textarea>

                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.interview.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection