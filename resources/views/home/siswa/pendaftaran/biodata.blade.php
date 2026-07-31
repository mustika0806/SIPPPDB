@extends('layouts.front.app')

@section('content')

<section id="ppdb" class="bg-light">

    <style>
        #ppdb {
            padding: 30px 0 60px;
        }

        .card-form {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .section-title {
            font-weight: 700;
            color: #009846;
            margin-bottom: 20px;
        }

        .block-title {
            font-weight: 700;
            margin-top: 25px;
            margin-bottom: 10px;
            color: #333;
            border-left: 4px solid #009846;
            padding-left: 10px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
        }

        .form-control,
        select,
        textarea {
            font-size: 14px;
        }

        .form-control.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, .12) !important;
        }

        .swal-error-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 330px;
            overflow-y: auto;
        }

        .swal-error-item {
            padding: 10px 12px;
            margin-bottom: 8px;
            background: #fff4f4;
            border-left: 4px solid #dc3545;
            border-radius: 6px;
            color: #721c24;
            font-size: 14px;
            line-height: 1.4;
        }
    </style>

    <div class="container">

        <h3 class="text-center section-title">
            Formulir PPDB SMKS Ma’arif NU Kota Batam
        </h3>

        <div class="card card-form">

            {{-- ================= DATA SISWA ================= --}}
            <div class="block-title">Data Siswa</div>

            <div class="row">

                <div class="col-md-4">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        class="form-control"
                        value="{{ Auth::user()->name }}"
                    >
                </div>

                <div class="col-md-4">
                    <label>Nama Panggilan</label>
                    <input
                        type="text"
                        id="nama_panggilan"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4">
                    <label>Tinggi Badan</label>
                    <input
                        type="number"
                        id="tinggi_badan"
                        class="form-control"
                        min="1"
                        placeholder="Contoh: 165"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Berat Badan</label>
                    <input
                        type="number"
                        id="berat_badan"
                        class="form-control"
                        min="1"
                        placeholder="Contoh: 55"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>NIK</label>
                    <input
                        type="text"
                        id="nik"
                        class="form-control"
                        maxlength="16"
                        inputmode="numeric"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Tanggal Pendaftaran</label>
                    <input
                        type="date"
                        id="tanggal_pendaftaran"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Jenis Kelamin</label>
                    <select id="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label>Agama</label>
                    <select id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label>Tempat Lahir</label>
                    <input
                        type="text"
                        id="tempat_lahir"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Tanggal Lahir</label>
                    <input
                        type="date"
                        id="tanggal_lahir"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Jumlah Saudara</label>
                    <input
                        type="number"
                        id="jumlah_saudara"
                        class="form-control"
                        min="0"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>No Akta Lahir</label>
                    <input
                        type="text"
                        id="no_akta_lahir"
                        class="form-control"
                    >
                </div>

            </div>

            {{-- ================= STATUS & KEBUTUHAN ================= --}}
            <div class="block-title">Status & Kebutuhan</div>

            <div class="row">

                <div class="col-md-4">
                    <label>Kewarganegaraan</label>
                    <select id="kewarganegaraan" class="form-control">
                        <option value="Indonesia">Indonesia</option>
                        <option value="Asing">Asing</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Kebutuhan Khusus</label>
                    <select id="kebutuhan_khusus" class="form-control">
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rungu</option>
                        <option value="Grahita">Grahita</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Daksa">Daksa</option>
                        <option value="Autis">Autis</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Anak Ke-</label>
                    <input
                        type="number"
                        id="anak_ke"
                        class="form-control"
                        min="1"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Apakah Siswa Pindahan?</label>
                    <select id="pindahan" class="form-control">
                        <option value="Tidak">Tidak</option>
                        <option value="Ya">Ya</option>
                    </select>
                </div>

            </div>

            {{-- ================= ALAMAT ================= --}}
            <div class="block-title">Alamat Lengkap</div>

            <div class="row">

                <div class="col-md-12">
                    <label>Alamat</label>
                    <textarea
                        id="alamat_asal"
                        class="form-control"
                        rows="3"
                    ></textarea>
                </div>

                <div class="col-md-3 mt-2">
                    <label>RT</label>
                    <input
                        type="text"
                        id="rt"
                        class="form-control"
                        inputmode="numeric"
                    >
                </div>

                <div class="col-md-3 mt-2">
                    <label>RW</label>
                    <input
                        type="text"
                        id="rw"
                        class="form-control"
                        inputmode="numeric"
                    >
                </div>

                <div class="col-md-3 mt-2">
                    <label>Dusun</label>
                    <input
                        type="text"
                        id="dusun"
                        class="form-control"
                    >
                </div>

                <div class="col-md-3 mt-2">
                    <label>Kode Pos</label>
                    <input
                        type="text"
                        id="kode_pos"
                        class="form-control"
                        maxlength="5"
                        inputmode="numeric"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Kelurahan</label>
                    <input
                        type="text"
                        id="kelurahan"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Kecamatan</label>
                    <input
                        type="text"
                        id="kecamatan"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Kota</label>
                    <input
                        type="text"
                        id="kota"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Provinsi</label>
                    <input
                        type="text"
                        id="provinsi"
                        class="form-control"
                    >
                </div>

            </div>

            {{-- ================= ORANG TUA ================= --}}
            <div class="block-title">Orang Tua / Wali</div>

            <div class="row">

                <div class="col-md-4">
                    <label>Nama Ayah</label>
                    <input
                        type="text"
                        id="nama_ayah"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4">
                    <label>Nama Ibu</label>
                    <input
                        type="text"
                        id="nama_ibu"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4">
                    <label>Pekerjaan Ayah</label>
                    <input
                        type="text"
                        id="pekerjaan_ayah"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Pekerjaan Ibu</label>
                    <input
                        type="text"
                        id="pekerjaan_ibu"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>No HP Orang Tua</label>
                    <input
                        type="text"
                        id="no_telp"
                        class="form-control"
                        inputmode="tel"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>No HP Siswa</label>
                    <input
                        type="text"
                        id="no_hp"
                        class="form-control"
                        inputmode="tel"
                    >
                </div>

            </div>

            {{-- ================= PRIBADI ================= --}}
            <div class="block-title">Pribadi</div>

            <div class="row">

                <div class="col-md-4 mt-2">
                    <label>Alamat Email</label>
                    <input
                        type="email"
                        id="alamat_email"
                        class="form-control"
                    >
                </div>

                <div class="col-md-4 mt-2">
                    <label>Kegiatan Olahraga</label>
                    <select id="kegiatan_olahraga" class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Kurang">Kurang</option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label>Kegiatan Kesenian</label>
                    <select id="kegiatan_kesenian" class="form-control">
                        <option value="Aktif">Aktif</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Kurang">Kurang</option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label>Prestasi</label>
                    <input
                        type="text"
                        id="prestasi"
                        class="form-control"
                    >
                </div>

            </div>

            {{-- ================= SOSIAL EKONOMI ================= --}}
            <div class="block-title">Sosial Ekonomi</div>

            <div class="row">

                <div class="col-md-4">
                    <label>Tempat Tinggal</label>
                    <select id="status_tempat" class="form-control">
                        <option value="rumah sendiri">Rumah Sendiri</option>
                        <option value="kontrakan">Kontrakan</option>
                        <option value="kosan">Kosan</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Transportasi</label>
                    <select id="transportasi" class="form-control">
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                        <option value="Angkutan Umum">Angkutan Umum</option>
                        <option value="Sepeda">Sepeda</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Penerima KPS/PKH</label>
                    <select id="kps_pkp" class="form-control">
                        <option value="Tidak">Tidak</option>
                        <option value="Ya">Ya</option>
                    </select>
                </div>

            </div>

            <button
                type="button"
                class="btn btn-success w-100 mt-4"
                id="next"
            >
                <span class="button-text">
                    Simpan & Lanjut
                </span>

                <span
                    class="button-loading d-none"
                >
                    <span
                        class="spinner-border spinner-border-sm mr-1"
                        role="status"
                        aria-hidden="true"
                    ></span>

                    Menyimpan...
                </span>
            </button>

        </div>
    </div>
</section>

@push('js')

    {{-- SWEETALERT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {

            const fieldLabels = {
                name: 'Nama Lengkap',
                nama_lengkap: 'Nama Lengkap',
                nama_panggilan: 'Nama Panggilan',
                tinggi_badan: 'Tinggi Badan',
                berat_badan: 'Berat Badan',
                nik: 'NIK',
                tanggal_pendaftaran: 'Tanggal Pendaftaran',
                jenis_kelamin: 'Jenis Kelamin',
                agama: 'Agama',
                tempat_lahir: 'Tempat Lahir',
                tanggal_lahir: 'Tanggal Lahir',
                jumlah_saudara: 'Jumlah Saudara',
                no_akta_lahir: 'Nomor Akta Lahir',
                kewarganegaraan: 'Kewarganegaraan',
                kebutuhan_khusus: 'Kebutuhan Khusus',
                anak_ke: 'Anak Ke',
                pindahan: 'Status Siswa Pindahan',
                alamat_asal: 'Alamat',
                rt: 'RT',
                rw: 'RW',
                dusun: 'Dusun',
                kode_pos: 'Kode Pos',
                kelurahan: 'Kelurahan',
                kecamatan: 'Kecamatan',
                kota: 'Kota',
                provinsi: 'Provinsi',
                nama_ayah: 'Nama Ayah',
                nama_ibu: 'Nama Ibu',
                pekerjaan_ayah: 'Pekerjaan Ayah',
                pekerjaan_ibu: 'Pekerjaan Ibu',
                no_telp: 'Nomor HP Orang Tua',
                no_hp: 'Nomor HP Siswa',
                alamat_email: 'Alamat Email',
                kegiatan_olahraga: 'Kegiatan Olahraga',
                kegiatan_kesenian: 'Kegiatan Kesenian',
                prestasi: 'Prestasi',
                status_tempat: 'Tempat Tinggal',
                transportasi: 'Transportasi',
                kps_pkp: 'Penerima KPS/PKH'
            };

            function getFieldLabel(field) {
                if (fieldLabels[field]) {
                    return fieldLabels[field];
                }

                return field
                    .replace(/\./g, ' ')
                    .replace(/_/g, ' ')
                    .replace(/\b\w/g, function (character) {
                        return character.toUpperCase();
                    });
            }

            function translateMessage(message, field) {
                const fieldLabel = getFieldLabel(field);

                if (!message) {
                    return fieldLabel + ' belum valid.';
                }

                if (/field is required/i.test(message)) {
                    return fieldLabel + ' wajib diisi.';
                }

                if (/must be a valid email address/i.test(message)) {
                    return fieldLabel + ' harus berupa alamat email yang valid.';
                }

                if (/must be a number/i.test(message)) {
                    return fieldLabel + ' harus berupa angka.';
                }

                if (/must be an integer/i.test(message)) {
                    return fieldLabel + ' harus berupa bilangan bulat.';
                }

                if (/must be a date/i.test(message)) {
                    return fieldLabel + ' harus berupa tanggal yang valid.';
                }

                if (/must be a string/i.test(message)) {
                    return fieldLabel + ' harus berupa teks.';
                }

                if (/has already been taken/i.test(message)) {
                    return fieldLabel + ' sudah digunakan.';
                }

                if (/may not be greater than/i.test(message)) {
                    return fieldLabel + ' melebihi batas maksimal yang diperbolehkan.';
                }

                if (/must be at least/i.test(message)) {
                    return fieldLabel + ' belum memenuhi nilai minimal.';
                }

                if (/selected .* is invalid/i.test(message)) {
                    return 'Pilihan pada ' + fieldLabel + ' tidak valid.';
                }

                return message;
            }

            function escapeHtml(value) {
                return $('<div>')
                    .text(value)
                    .html();
            }

            function resetInvalidFields() {
                $('.form-control').removeClass('is-invalid');
            }

            function markInvalidFields(errors) {
                let firstInvalidField = null;

                Object.keys(errors).forEach(function (field) {
                    const cleanField = field
                        .replace(/\./g, '_');

                    const element = $('#' + cleanField);

                    if (element.length) {
                        element.addClass('is-invalid');

                        if (!firstInvalidField) {
                            firstInvalidField = element;
                        }
                    }
                });

                return firstInvalidField;
            }

            function setButtonLoading(isLoading) {
                const button = $('#next');

                button.prop('disabled', isLoading);

                if (isLoading) {
                    button.find('.button-text').addClass('d-none');
                    button.find('.button-loading').removeClass('d-none');
                } else {
                    button.find('.button-text').removeClass('d-none');
                    button.find('.button-loading').addClass('d-none');
                }
            }

            $('.form-control').on('input change', function () {
                $(this).removeClass('is-invalid');
            });

            $('#next').on('click', function (event) {
                event.preventDefault();

                resetInvalidFields();
                setButtonLoading(true);

                $.ajax({
                    url: "{{ route('siswa.pendaftaran.biodata') }}",
                    type: "POST",

                    data: {
                        _token: "{{ csrf_token() }}",

                        name: $('#name').val(),
                        nama_lengkap: $('#name').val(),
                        nama_panggilan: $('#nama_panggilan').val(),
                        tinggi_badan: $('#tinggi_badan').val(),
                        berat_badan: $('#berat_badan').val(),
                        nik: $('#nik').val(),
                        tanggal_pendaftaran: $('#tanggal_pendaftaran').val(),
                        jenis_kelamin: $('#jenis_kelamin').val(),
                        agama: $('#agama').val(),
                        tempat_lahir: $('#tempat_lahir').val(),
                        tanggal_lahir: $('#tanggal_lahir').val(),
                        jumlah_saudara: $('#jumlah_saudara').val(),
                        no_akta_lahir: $('#no_akta_lahir').val(),

                        kewarganegaraan: $('#kewarganegaraan').val(),
                        kebutuhan_khusus: $('#kebutuhan_khusus').val(),
                        anak_ke: $('#anak_ke').val(),
                        pindahan: $('#pindahan').val(),

                        alamat_asal: $('#alamat_asal').val(),
                        rt: $('#rt').val(),
                        rw: $('#rw').val(),
                        dusun: $('#dusun').val(),
                        kode_pos: $('#kode_pos').val(),
                        kelurahan: $('#kelurahan').val(),
                        kecamatan: $('#kecamatan').val(),
                        kota: $('#kota').val(),

                        // Sudah diperbaiki: sebelumnya mengambil nilai kota
                        provinsi: $('#provinsi').val(),

                        nama_ayah: $('#nama_ayah').val(),
                        nama_ibu: $('#nama_ibu').val(),
                        pekerjaan_ayah: $('#pekerjaan_ayah').val(),
                        pekerjaan_ibu: $('#pekerjaan_ibu').val(),
                        no_telp: $('#no_telp').val(),
                        no_hp: $('#no_hp').val(),

                        alamat_email: $('#alamat_email').val(),
                        kegiatan_olahraga: $('#kegiatan_olahraga').val(),
                        kegiatan_kesenian: $('#kegiatan_kesenian').val(),
                        prestasi: $('#prestasi').val(),

                        status_tempat: $('#status_tempat').val(),
                        transportasi: $('#transportasi').val(),
                        kps_pkp: $('#kps_pkp').val()
                    },

                    success: function (response) {
                        setButtonLoading(false);

                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Disimpan',
                            text: response.message ||
                                'Biodata siswa berhasil disimpan.',
                            confirmButtonText: 'Lanjutkan',
                            confirmButtonColor: '#009846',
                            allowOutsideClick: false
                        }).then(function () {
                            if (response.url) {
                                window.location.href = response.url;
                            }
                        });
                    },

                    error: function (xhr) {
                        setButtonLoading(false);

                        console.error('AJAX error:', xhr.responseJSON);

                        const response = xhr.responseJSON || {};
                        const errors = response.errors || {};

                        /*
                        |--------------------------------------------------------------------------
                        | Error validasi Laravel 422
                        |--------------------------------------------------------------------------
                        */
                        if (
                            xhr.status === 422 &&
                            Object.keys(errors).length > 0
                        ) {
                            const firstInvalidField =
                                markInvalidFields(errors);

                            let errorItems = '';
                            let totalErrors = 0;

                            Object.keys(errors).forEach(function (field) {
                                const messages = errors[field] || [];

                                messages.forEach(function (message) {
                                    totalErrors++;

                                    const translatedMessage =
                                        translateMessage(message, field);

                                    errorItems += `
                                        <li class="swal-error-item">
                                            ${escapeHtml(translatedMessage)}
                                        </li>
                                    `;
                                });
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Data Belum Lengkap',
                                html: `
                                    <div style="text-align:left;">
                                        <p style="
                                            margin-bottom:12px;
                                            color:#555;
                                            line-height:1.5;
                                        ">
                                            Terdapat
                                            <strong>${totalErrors} kesalahan</strong>.
                                            Silakan lengkapi atau perbaiki
                                            data berikut:
                                        </p>

                                        <ul class="swal-error-list">
                                            ${errorItems}
                                        </ul>
                                    </div>
                                `,
                                confirmButtonText: 'Periksa Formulir',
                                confirmButtonColor: '#009846',
                                width: 650,
                                allowOutsideClick: false
                            }).then(function () {
                                if (
                                    firstInvalidField &&
                                    firstInvalidField.length
                                ) {
                                    $('html, body').animate({
                                        scrollTop:
                                            firstInvalidField
                                                .offset()
                                                .top - 120
                                    }, 500);

                                    firstInvalidField.trigger('focus');
                                }
                            });

                            return;
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Sesi login habis atau CSRF tidak valid
                        |--------------------------------------------------------------------------
                        */
                        if (xhr.status === 419) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Sesi Telah Berakhir',
                                text: 'Silakan muat ulang halaman, kemudian coba kembali.',
                                confirmButtonText: 'Muat Ulang',
                                confirmButtonColor: '#009846',
                                allowOutsideClick: false
                            }).then(function () {
                                window.location.reload();
                            });

                            return;
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Error selain validasi
                        |--------------------------------------------------------------------------
                        */
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Menyimpan Data',
                            text: response.message ||
                                'Terjadi kesalahan pada sistem. Silakan coba kembali.',
                            confirmButtonText: 'Tutup',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            });

        });
    </script>

@endpush

@endsection