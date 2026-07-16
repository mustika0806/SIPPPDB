@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h4 class="mb-0 text-success font-weight-bold">
                Penilaian Wawancara
            </h4>
            <small class="text-muted">
                Perbarui jadwal wawancara dan isi hasil penilaian setelah wawancara selesai
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

            @php
                $jenisWawancara = old('interview_type', $interview->interview_type);

                if (!$jenisWawancara) {
                    if (!empty($interview->interview_place)) {
                        $jenisWawancara = 'offline';
                    } elseif (!empty($interview->meeting_link)) {
                        $jenisWawancara = 'online';
                    }
                }

                $tanggalWawancara = old(
                    'interview_date',
                    $interview->interview_date
                        ? \Carbon\Carbon::parse($interview->interview_date)->format('Y-m-d')
                        : ''
                );

                $jamWawancara = old(
                    'interview_time',
                    $interview->interview_time
                        ? \Carbon\Carbon::parse($interview->interview_time)->format('H:i')
                        : ''
                );
            @endphp

            <form action="{{ route('admin.interview.update', $interview->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- BAGIAN 1: DATA JADWAL --}}
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <strong>
                                    <i class="fas fa-calendar-alt"></i>
                                    Data Jadwal Wawancara
                                </strong>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">
                                        Nama Siswa
                                    </label>

                                    <select name="user_id" class="form-control" required>
                                        <option value="">-- Pilih Siswa --</option>

                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}"
                                                {{ old('user_id', $interview->user_id) == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Jenis Wawancara
                                    </label>

                                    <select name="interview_type" id="interview_type" class="form-control" required>
                                        <option value="">-- Pilih Jenis Wawancara --</option>

                                        <option value="online" {{ $jenisWawancara == 'online' ? 'selected' : '' }}>
                                            Online / Google Meet
                                        </option>

                                        <option value="offline" {{ $jenisWawancara == 'offline' ? 'selected' : '' }}>
                                            Offline / Tatap Muka
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Tanggal Wawancara
                                    </label>

                                    <input type="date"
                                           name="interview_date"
                                           class="form-control"
                                           value="{{ $tanggalWawancara }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Jam Wawancara
                                    </label>

                                    <input type="time"
                                           name="interview_time"
                                           class="form-control"
                                           value="{{ $jamWawancara }}"
                                           required>
                                </div>

                                <div class="mb-3" id="onlineField" style="display: none;">
                                    <label class="form-label">
                                        Link Wawancara Online
                                    </label>

                                    <input type="url"
                                           name="meeting_link"
                                           id="meeting_link"
                                           class="form-control"
                                           value="{{ old('meeting_link', $interview->meeting_link) }}"
                                           placeholder="https://meet.google.com/xxx-xxxx-xxx">

                                    <small class="text-muted">
                                        Diisi jika wawancara dilakukan secara online.
                                    </small>
                                </div>

                                <div class="mb-3" id="offlineField" style="display: none;">
                                    <label class="form-label">
                                        Lokasi Wawancara Offline
                                    </label>

                                    <input type="text"
                                           name="interview_place"
                                           id="interview_place"
                                           class="form-control"
                                           value="{{ old('interview_place', $interview->interview_place) }}"
                                           placeholder="Contoh: Ruang Panitia PPDB SMKS Ma'arif NU Kota Batam">

                                    <small class="text-muted">
                                        Diisi jika wawancara dilakukan secara offline.
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- BAGIAN 2: PENILAIAN --}}
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-success text-white">
                                <strong>
                                    <i class="fas fa-clipboard-check"></i>
                                    Hasil Penilaian Wawancara
                                </strong>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">
                                        Nilai Wawancara <span class="text-danger">*</span>
                                    </label>

                                    <input type="number"
                                           name="score"
                                           class="form-control"
                                           min="0"
                                           max="100"
                                           value="{{ old('score', $interview->score) }}"
                                           placeholder="Masukkan nilai 0 - 100"
                                           required>

                                    <small class="text-muted">
                                        Wajib diisi setelah wawancara selesai.
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Catatan Wawancara <span class="text-danger">*</span>
                                    </label>

                                    <textarea name="notes"
                                              class="form-control"
                                              rows="7"
                                              placeholder="Masukkan catatan hasil wawancara"
                                              required>{{ old('notes', $interview->notes) }}</textarea>

                                    <small class="text-muted">
                                        Wajib diisi sebagai keterangan hasil wawancara.
                                    </small>
                                </div>

                                <div class="alert alert-light border mb-0">
                                    <strong>Status otomatis:</strong>
                                    <br>
                                    <small>
                                        Nilai 70 ke atas = Lulus<br>
                                        Nilai di bawah 70 = Tidak Lulus
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.interview.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
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

            } else if (interviewType.value === 'offline') {
                onlineField.style.display = 'none';
                offlineField.style.display = 'block';

                meetingLink.required = false;
                interviewPlace.required = true;

            } else {
                onlineField.style.display = 'none';
                offlineField.style.display = 'none';

                meetingLink.required = false;
                interviewPlace.required = false;
            }
        }

        interviewType.addEventListener('change', toggleInterviewFields);
        toggleInterviewFields();
    });
</script>
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

            } else if (interviewType.value === 'offline') {
                onlineField.style.display = 'none';
                offlineField.style.display = 'block';

                meetingLink.required = false;
                interviewPlace.required = true;

            } else {
                onlineField.style.display = 'none';
                offlineField.style.display = 'none';

                meetingLink.required = false;
                interviewPlace.required = false;
            }
        }

        interviewType.addEventListener('change', toggleInterviewFields);
        toggleInterviewFields();
    });
</script>

{{-- SCRIPT PESAN VALIDASI BAHASA INDONESIA --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');

        if (!form) return;

        const fields = form.querySelectorAll('input, select, textarea');

        fields.forEach(function (field) {
            function getLabelName() {
                const formGroup = field.closest('.mb-3');
                const label = formGroup ? formGroup.querySelector('label') : null;

                if (label) {
                    return label.innerText.replace('*', '').trim();
                }

                return 'Kolom ini';
            }

            field.addEventListener('invalid', function () {
                const labelName = getLabelName();

                if (field.validity.valueMissing) {
                    field.setCustomValidity(labelName + ' wajib diisi.');
                } else if (field.validity.typeMismatch && field.type === 'url') {
                    field.setCustomValidity('Masukkan link yang valid.');
                } else if (field.validity.rangeUnderflow || field.validity.rangeOverflow) {
                    field.setCustomValidity(labelName + ' harus diisi antara 0 sampai 100.');
                } else {
                    field.setCustomValidity('Mohon periksa kembali isian ini.');
                }
            });

            field.addEventListener('input', function () {
                field.setCustomValidity('');
            });

            field.addEventListener('change', function () {
                field.setCustomValidity('');
            });
        });
    });
</script>

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

            } else if (interviewType.value === 'offline') {
                onlineField.style.display = 'none';
                offlineField.style.display = 'block';

                meetingLink.required = false;
                interviewPlace.required = true;

            } else {
                onlineField.style.display = 'none';
                offlineField.style.display = 'none';

                meetingLink.required = false;
                interviewPlace.required = false;
            }
        }

        interviewType.addEventListener('change', toggleInterviewFields);
        toggleInterviewFields();
    });
</script>

{{-- SCRIPT PESAN VALIDASI BAHASA INDONESIA --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');

        if (!form) return;

        const fields = form.querySelectorAll('input, select, textarea');

        fields.forEach(function (field) {
            function getLabelName() {
                const formGroup = field.closest('.mb-3');
                const label = formGroup ? formGroup.querySelector('label') : null;

                if (label) {
                    return label.innerText.replace('*', '').trim();
                }

                return 'Kolom ini';
            }

            field.addEventListener('invalid', function () {
                const labelName = getLabelName();

                if (field.validity.valueMissing) {
                    field.setCustomValidity(labelName + ' wajib diisi.');
                } else if (field.validity.typeMismatch && field.type === 'url') {
                    field.setCustomValidity('Masukkan link yang valid.');
                } else if (field.validity.rangeUnderflow || field.validity.rangeOverflow) {
                    field.setCustomValidity(labelName + ' harus diisi antara 0 sampai 100.');
                } else {
                    field.setCustomValidity('Mohon periksa kembali isian ini.');
                }
            });

            field.addEventListener('input', function () {
                field.setCustomValidity('');
            });

            field.addEventListener('change', function () {
                field.setCustomValidity('');
            });
        });
    });
</script>

@endsection
