@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">
                Tambah Jadwal Wawancara
            </h4>
            <small class="text-muted">
                Tambahkan jadwal seleksi wawancara calon peserta didik
            </small>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan input.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.interview.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih Siswa --</option>

                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('user_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Wawancara</label>
                    <select name="interview_type" id="interview_type" class="form-control" required>
                        <option value="">-- Pilih Jenis Wawancara --</option>

                        <option value="online" {{ old('interview_type') == 'online' ? 'selected' : '' }}>
                            Online / Google Meet
                        </option>

                        <option value="offline" {{ old('interview_type') == 'offline' ? 'selected' : '' }}>
                            Offline / Tatap Muka
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Wawancara</label>
                    <input type="date"
                           name="interview_date"
                           class="form-control"
                           value="{{ old('interview_date') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Wawancara</label>
                    <input type="time"
                           name="interview_time"
                           class="form-control"
                           value="{{ old('interview_time') }}"
                           required>
                </div>

                <div class="mb-3" id="onlineField" style="display: none;">
                    <label class="form-label">Link Wawancara Online</label>
                    <input type="url"
                           name="meeting_link"
                           id="meeting_link"
                           class="form-control"
                           value="{{ old('meeting_link') }}"
                           placeholder="https://meet.google.com/xxx-xxxx-xxx">

                    <small class="text-muted">
                        Diisi jika wawancara dilakukan secara online.
                    </small>
                </div>

                <div class="mb-3" id="offlineField" style="display: none;">
                    <label class="form-label">Lokasi Wawancara Offline</label>
                    <input type="text"
                           name="interview_place"
                           id="interview_place"
                           class="form-control"
                           value="{{ old('interview_place') }}"
                           placeholder="Contoh: Ruang Panitia PPDB SMKS Ma'arif NU Kota Batam">

                    <small class="text-muted">
                        Diisi jika wawancara dilakukan secara offline.
                    </small>
                </div>
                

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.interview.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Jadwal
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const interviewType = document.getElementById('interview_type');
        const onlineField = document.getElementById('onlineField');
        const offlineField = document.getElementById('offlineField');
        const meetingLink = document.getElementById('meeting_link');
        const interviewPlace = document.getElementById('interview_place');

        function toggleInterviewFields() {
            if (interviewType.value === 'online') {
                onlineField.style.display = 'block';
                offlineField.style.display = 'none';

                meetingLink.required = true;
                interviewPlace.required = false;
                interviewPlace.value = '';

            } else if (interviewType.value === 'offline') {
                onlineField.style.display = 'none';
                offlineField.style.display = 'block';

                meetingLink.required = false;
                meetingLink.value = '';
                interviewPlace.required = true;

            } else {
                onlineField.style.display = 'none';
                offlineField.style.display = 'none';

                meetingLink.required = false;
                interviewPlace.required = false;

                meetingLink.value = '';
                interviewPlace.value = '';
            }
        }

        interviewType.addEventListener('change', toggleInterviewFields);
        toggleInterviewFields();
    });
</script>
@endsection