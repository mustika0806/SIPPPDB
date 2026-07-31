@extends('layouts.app')

@section('content')

<style>
    /*
    |--------------------------------------------------------------------------
    | Menghilangkan ikon panah pada select yang dikunci
    |--------------------------------------------------------------------------
    */
    .select-tanpa-panah {
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        background-image: none !important;
        padding-right: 12px !important;
        cursor: default !important;
    }

    .select-tanpa-panah::-ms-expand {
        display: none;
    }

    /*
    |--------------------------------------------------------------------------
    | Tampilan input yang tidak dapat diedit
    |--------------------------------------------------------------------------
    */
    .form-control:disabled,
    .form-control[readonly] {
        background-color: #f3f5f9;
        color: #495057;
        opacity: 1;
        cursor: default;
    }
</style>

<div class="container-fluid">

    @php
        $isHasil = $mode === 'hasil';
        $isJadwal = $mode === 'jadwal';

        /*
        |--------------------------------------------------------------------------
        | Jenis wawancara
        |--------------------------------------------------------------------------
        */
        $jenisWawancara = old(
            'interview_type',
            $interview->interview_type
        );

        /*
        |--------------------------------------------------------------------------
        | Menentukan jenis wawancara dari data lama
        |--------------------------------------------------------------------------
        */
        if (!$jenisWawancara) {
            if (!empty($interview->interview_place)) {
                $jenisWawancara = 'offline';
            } elseif (!empty($interview->meeting_link)) {
                $jenisWawancara = 'online';
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Format tanggal wawancara
        |--------------------------------------------------------------------------
        */
        $tanggalWawancara = old(
            'interview_date',
            $interview->interview_date
                ? \Carbon\Carbon::parse(
                    $interview->interview_date
                )->format('Y-m-d')
                : ''
        );

        /*
        |--------------------------------------------------------------------------
        | Format jam wawancara
        |--------------------------------------------------------------------------
        */
        $jamWawancara = old(
            'interview_time',
            $interview->interview_time
                ? \Carbon\Carbon::parse(
                    $interview->interview_time
                )->format('H:i')
                : ''
        );
    @endphp

    <div class="card shadow-sm border-0">

        {{-- HEADER HALAMAN --}}
        <div class="card-header bg-white">

            <h4 class="mb-0 text-success font-weight-bold">
                @if ($isHasil)
                    Penilaian Wawancara
                @else
                    Jadwal Ulang Wawancara
                @endif
            </h4>

            <small class="text-muted">
                @if ($isHasil)
                    Isi nilai dan catatan setelah proses wawancara selesai.
                @else
                    Perbarui jenis, tanggal, jam, dan lokasi wawancara siswa.
                @endif
            </small>

        </div>

        <div class="card-body">

            {{-- PESAN VALIDASI --}}
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

            <form
                action="{{ route('admin.interview.update', $interview->id) }}"
                method="POST"
                id="formInterview"
            >
                @csrf
                @method('PUT')

                {{-- MODE HALAMAN --}}
                <input
                    type="hidden"
                    name="mode"
                    value="{{ $mode }}"
                >

                <div class="row">

                    {{-- =====================================================
                        BAGIAN DATA JADWAL WAWANCARA
                    ====================================================== --}}
                    <div class="{{ $isJadwal ? 'col-lg-12' : 'col-lg-6' }} mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-header bg-primary text-white">

                                <strong>
                                    <i class="fas fa-calendar-alt"></i>
                                    Data Jadwal Wawancara
                                </strong>

                            </div>

                            <div class="card-body">

                                {{-- NAMA SISWA --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Nama Siswa
                                    </label>

                                    <select
                                        class="form-control select-tanpa-panah"
                                        disabled
                                    >
                                        <option selected>
                                            {{ optional($interview->user)->name ?? 'Nama siswa tidak ditemukan' }}
                                        </option>
                                    </select>

                                    <small class="text-muted">
                                        Nama siswa tidak dapat diubah.
                                    </small>

                                </div>

                                {{-- JENIS WAWANCARA --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Jenis Wawancara
                                    </label>

                                    <select
                                        name="interview_type"
                                        id="interview_type"
                                        class="form-control {{ $isHasil ? 'select-tanpa-panah' : '' }}"
                                        @if ($isHasil) disabled @endif
                                        @if ($isJadwal) required @endif
                                    >
                                        <option value="">
                                            -- Pilih Jenis Wawancara --
                                        </option>

                                        <option
                                            value="online"
                                            {{ $jenisWawancara === 'online' ? 'selected' : '' }}
                                        >
                                            Online / Google Meet
                                        </option>

                                        <option
                                            value="offline"
                                            {{ $jenisWawancara === 'offline' ? 'selected' : '' }}
                                        >
                                            Offline / Tatap Muka
                                        </option>
                                    </select>

                                    @if ($isHasil)
                                        <small class="text-muted">
                                            Jenis wawancara tidak dapat diubah pada halaman penilaian.
                                        </small>
                                    @endif

                                </div>

                                {{-- TANGGAL WAWANCARA --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Tanggal Wawancara
                                    </label>

                                    <input
                                        type="date"
                                        name="interview_date"
                                        class="form-control"
                                        value="{{ $tanggalWawancara }}"
                                        @if ($isHasil) disabled @endif
                                        @if ($isJadwal) required @endif
                                    >

                                    @if ($isHasil)
                                        <small class="text-muted">
                                            Tanggal wawancara tidak dapat diubah pada halaman penilaian.
                                        </small>
                                    @endif

                                </div>

                                {{-- JAM WAWANCARA --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Jam Wawancara
                                    </label>

                                    <input
                                        type="time"
                                        name="interview_time"
                                        class="form-control"
                                        value="{{ $jamWawancara }}"
                                        @if ($isHasil) disabled @endif
                                        @if ($isJadwal) required @endif
                                    >

                                    @if ($isHasil)
                                        <small class="text-muted">
                                            Jam wawancara tidak dapat diubah pada halaman penilaian.
                                        </small>
                                    @endif

                                </div>

                                {{-- LINK WAWANCARA ONLINE --}}
                                <div
                                    class="mb-3"
                                    id="onlineField"
                                    style="{{ $jenisWawancara === 'online' ? '' : 'display: none;' }}"
                                >

                                    <label class="form-label">
                                        Link Wawancara Online
                                    </label>

                                    <input
                                        type="url"
                                        name="meeting_link"
                                        id="meeting_link"
                                        class="form-control"
                                        value="{{ old('meeting_link', $interview->meeting_link) }}"
                                        placeholder="https://meet.google.com/xxx-xxxx-xxx"
                                        @if ($isHasil) disabled @endif
                                        @if ($isJadwal && $jenisWawancara === 'online') required @endif
                                    >

                                    <small class="text-muted">
                                        @if ($isHasil)
                                            Link wawancara tidak dapat diubah pada halaman penilaian.
                                        @else
                                            Wajib diisi jika wawancara dilakukan secara online.
                                        @endif
                                    </small>

                                </div>

                                {{-- LOKASI WAWANCARA OFFLINE --}}
                                <div
                                    class="mb-3"
                                    id="offlineField"
                                    style="{{ $jenisWawancara === 'offline' ? '' : 'display: none;' }}"
                                >

                                    <label class="form-label">
                                        Lokasi Wawancara Offline
                                    </label>

                                    <input
                                        type="text"
                                        name="interview_place"
                                        id="interview_place"
                                        class="form-control"
                                        value="{{ old('interview_place', $interview->interview_place) }}"
                                        placeholder="Contoh: Ruang Panitia PPDB SMKS Ma'arif NU Kota Batam"
                                        maxlength="255"
                                        @if ($isHasil) disabled @endif
                                        @if ($isJadwal && $jenisWawancara === 'offline') required @endif
                                    >

                                    <small class="text-muted">
                                        @if ($isHasil)
                                            Lokasi wawancara tidak dapat diubah pada halaman penilaian.
                                        @else
                                            Wajib diisi jika wawancara dilakukan secara offline.
                                        @endif
                                    </small>

                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- =====================================================
                        HASIL PENILAIAN
                        HANYA MUNCUL PADA MODE HASIL
                    ====================================================== --}}
                    @if ($isHasil)

                        <div class="col-lg-6 mb-4">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-header bg-success text-white">

                                    <strong>
                                        <i class="fas fa-clipboard-check"></i>
                                        Hasil Penilaian Wawancara
                                    </strong>

                                </div>

                                <div class="card-body">

                                    {{-- NILAI WAWANCARA --}}
                                    <div class="mb-3">

                                        <label class="form-label">
                                            Nilai Wawancara
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input
                                            type="number"
                                            name="score"
                                            class="form-control"
                                            min="0"
                                            max="100"
                                            step="1"
                                            value="{{ old('score', $interview->score) }}"
                                            placeholder="Masukkan nilai 0 - 100"
                                            required
                                        >

                                        <small class="text-muted">
                                            Wajib diisi setelah wawancara selesai.
                                        </small>

                                    </div>

                                    {{-- CATATAN WAWANCARA --}}
                                    <div class="mb-3">

                                        <label class="form-label">
                                            Catatan Wawancara
                                            <span class="text-danger">*</span>
                                        </label>

                                        <textarea
                                            name="notes"
                                            class="form-control"
                                            rows="7"
                                            maxlength="1000"
                                            placeholder="Masukkan catatan hasil wawancara"
                                            required
                                        >{{ old('notes', $interview->notes) }}</textarea>

                                        <small class="text-muted">
                                            Wajib diisi sebagai keterangan hasil wawancara.
                                        </small>

                                    </div>

                                    {{-- STATUS OTOMATIS --}}
                                    <div class="alert alert-light border mb-0">

                                        <strong>Status otomatis:</strong>

                                        <br>

                                        <small>
                                            Nilai 70 ke atas = Lulus
                                            <br>
                                            Nilai di bawah 70 = Tidak Lulus
                                        </small>

                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif

                </div>

                {{-- TOMBOL AKSI --}}
                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('admin.interview.index') }}"
                        class="btn btn-secondary"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn {{ $isHasil ? 'btn-success' : 'btn-primary' }}"
                    >
                        @if ($isHasil)
                            <i class="fas fa-save"></i>
                            Simpan Hasil Penilaian
                        @else
                            <i class="fas fa-calendar-check"></i>
                            Simpan Jadwal Ulang
                        @endif
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

{{-- =========================================================
    SCRIPT JENIS WAWANCARA DAN VALIDASI
========================================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formInterview');

    if (!form) {
        return;
    }

    const isHasilMode = @json($isHasil);

    const interviewType =
        document.getElementById('interview_type');

    const onlineField =
        document.getElementById('onlineField');

    const offlineField =
        document.getElementById('offlineField');

    const meetingLink =
        document.getElementById('meeting_link');

    const interviewPlace =
        document.getElementById('interview_place');

    /*
    |--------------------------------------------------------------------------
    | Menampilkan field berdasarkan jenis wawancara
    |--------------------------------------------------------------------------
    */
    function toggleInterviewFields() {
        if (
            !interviewType ||
            !onlineField ||
            !offlineField ||
            !meetingLink ||
            !interviewPlace
        ) {
            return;
        }

        const selectedType = interviewType.value;

        if (selectedType === 'online') {
            onlineField.style.display = 'block';
            offlineField.style.display = 'none';

            meetingLink.required = !isHasilMode;
            interviewPlace.required = false;

        } else if (selectedType === 'offline') {
            onlineField.style.display = 'none';
            offlineField.style.display = 'block';

            meetingLink.required = false;
            interviewPlace.required = !isHasilMode;

        } else {
            onlineField.style.display = 'none';
            offlineField.style.display = 'none';

            meetingLink.required = false;
            interviewPlace.required = false;
        }
    }

    if (interviewType) {
        if (!isHasilMode) {
            interviewType.addEventListener(
                'change',
                toggleInterviewFields
            );
        }

        toggleInterviewFields();
    }

    /*
    |--------------------------------------------------------------------------
    | Pesan validasi Bahasa Indonesia
    |--------------------------------------------------------------------------
    */
    const fields = form.querySelectorAll(
        'input:not([type="hidden"]):not([disabled]), ' +
        'select:not([disabled]), ' +
        'textarea:not([disabled])'
    );

    fields.forEach(function (field) {

        function getLabelName() {
            const formGroup = field.closest('.mb-3');

            const label = formGroup
                ? formGroup.querySelector('label')
                : null;

            if (label) {
                return label.innerText
                    .replace('*', '')
                    .trim();
            }

            return 'Kolom ini';
        }

        field.addEventListener('invalid', function () {
            const labelName = getLabelName();

            if (field.validity.valueMissing) {
                field.setCustomValidity(
                    labelName + ' wajib diisi.'
                );

            } else if (
                field.validity.typeMismatch &&
                field.type === 'url'
            ) {
                field.setCustomValidity(
                    'Masukkan link wawancara yang valid.'
                );

            } else if (
                field.validity.rangeUnderflow ||
                field.validity.rangeOverflow
            ) {
                field.setCustomValidity(
                    labelName +
                    ' harus diisi antara 0 sampai 100.'
                );

            } else {
                field.setCustomValidity(
                    'Mohon periksa kembali isian ' +
                    labelName.toLowerCase() +
                    '.'
                );
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