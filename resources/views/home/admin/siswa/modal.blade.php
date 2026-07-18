<style>
    .detail-siswa-modal .modal-content {
        overflow: hidden;
        border: 0;
        border-radius: 12px;
    }

    .detail-siswa-modal .modal-header {
        padding: 18px 22px;
        color: #fff;
        background: linear-gradient(135deg, #4e73df, #224abe);
        border-bottom: 0;
    }

    .detail-siswa-modal .modal-header .close {
        color: #fff;
        text-shadow: none;
        opacity: .9;
    }

    .detail-siswa-modal .modal-body {
        max-height: 72vh;
        padding: 20px 22px;
        overflow-y: auto;
        background: #f8f9fc;
    }

    .detail-section {
        padding: 16px;
        margin-bottom: 18px;
        background: #fff;
        border: 1px solid #e3e6f0;
        border-radius: 9px;
        box-shadow: 0 2px 5px rgba(58, 59, 69, .05);
    }

    .detail-section:last-child {
        margin-bottom: 0;
    }

    .detail-section-title {
        padding-bottom: 9px;
        margin: 0 0 14px;
        color: #4e73df;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #e3e6f0;
    }

    .detail-item {
        height: 100%;
        min-height: 67px;
        padding: 10px 12px;
        background: #f8f9fc;
        border-left: 3px solid #4e73df;
        border-radius: 5px;
    }

    .detail-label {
        display: block;
        margin-bottom: 4px;
        color: #858796;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .25px;
        text-transform: uppercase;
    }

    .detail-value {
        display: block;
        color: #3a3b45;
        font-size: 14px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .detail-siswa-modal .modal-footer {
        padding: 12px 22px;
        background: #fff;
        border-top: 1px solid #e3e6f0;
    }

    @media (max-width: 767.98px) {
        .detail-siswa-modal .modal-dialog {
            margin: 10px;
        }

        .detail-siswa-modal .modal-body {
            max-height: 76vh;
            padding: 14px;
        }
    }
</style>

<div class="modal fade detail-siswa-modal"
    id="detailSiswa-{{ $loop->iteration }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="detailSiswaLabel-{{ $loop->iteration }}"
    aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            {{-- HEADER MODAL --}}
            <div class="modal-header">
                <div>
                    <h5 class="modal-title font-weight-bold"
                        id="detailSiswaLabel-{{ $loop->iteration }}">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Biodata Siswa
                    </h5>

                    <small>
                        {{ optional($item->user)->name ?? 'Nama siswa tidak tersedia' }}
                    </small>
                </div>

                <div class="d-flex align-items-center">
                    @if ($item->pindahan == 'Ya')
                        <span class="badge badge-warning mr-3 px-2 py-1">
                            Siswa Pindahan
                        </span>
                    @endif

                    <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            {{-- ISI MODAL --}}
            <div class="modal-body">

                {{-- INFORMASI PENDAFTARAN --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Informasi Pendaftaran
                    </h6>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Nama Lengkap</span>
                                <span class="detail-value">
                                    {{ optional($item->user)->name ?? '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Nama Panggilan</span>
                                <span class="detail-value">
                                    {{ $item->nama_panggilan ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Jurusan</span>
                                <span class="detail-value">
                                    {{ optional($item->kelas)->nama_jurusan ?? '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Tanggal Pendaftaran
                                </span>

                                <span class="detail-value">
                                    {{ $item->tanggal_pendaftaran
                                        ? \Carbon\Carbon::parse($item->tanggal_pendaftaran)->format('d-m-Y')
                                        : '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Status Pendaftaran
                                </span>

                                <span class="detail-value">
                                    {{ $item->status ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Jenis Pendaftar
                                </span>

                                <span class="detail-value">
                                    {{ $item->pindahan == 'Ya'
                                        ? 'Siswa Pindahan'
                                        : 'Siswa Baru' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- IDENTITAS PRIBADI --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-id-card mr-2"></i>
                        Identitas Pribadi
                    </h6>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">NIK</span>
                                <span class="detail-value">
                                    {{ $item->nik ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">NISN</span>
                                <span class="detail-value">
                                    {{ $item->nisn ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Nomor Akta Lahir
                                </span>

                                <span class="detail-value">
                                    {{ $item->no_akta_lahir ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Jenis Kelamin
                                </span>

                                <span class="detail-value">
                                    {{ $item->jenis_kelamin ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Tempat Lahir</span>
                                <span class="detail-value">
                                    {{ $item->tempat_lahir ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Tanggal Lahir</span>

                                <span class="detail-value">
                                    {{ $item->tanggal_lahir
                                        ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y')
                                        : '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Agama</span>
                                <span class="detail-value">
                                    {{ $item->agama ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Kewarganegaraan
                                </span>

                                <span class="detail-value">
                                    {{ $item->kewarganegaraan ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Kebutuhan Khusus
                                </span>

                                <span class="detail-value">
                                    {{ $item->kebutuhan_khusus ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Jumlah Saudara
                                </span>

                                <span class="detail-value">
                                    {{ $item->jumlah_saudara ?? '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">Tinggi Badan</span>

                                <span class="detail-value">
                                    {{ $item->tinggi_badan
                                        ? $item->tinggi_badan . ' cm'
                                        : '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="detail-item">
                                <span class="detail-label">Berat Badan</span>

                                <span class="detail-value">
                                    {{ $item->berat_badan
                                        ? $item->berat_badan . ' kg'
                                        : '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ALAMAT DAN KONTAK --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Alamat dan Kontak
                    </h6>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Alamat Lengkap
                                </span>

                                <span class="detail-value">
                                    {{ $item->alamat_asal ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">RT/RW</span>

                                <span class="detail-value">
                                    {{ $item->rt ?: '-' }}
                                    /
                                    {{ $item->rw ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Kelurahan</span>
                                <span class="detail-value">
                                    {{ $item->kelurahan ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Kecamatan</span>
                                <span class="detail-value">
                                    {{ $item->kecamatan ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Kota/Kabupaten
                                </span>

                                <span class="detail-value">
                                    {{ $item->kota ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Provinsi</span>
                                <span class="detail-value">
                                    {{ $item->provinsi ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">Kode Pos</span>
                                <span class="detail-value">
                                    {{ $item->kode_pos ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Status Tempat Tinggal
                                </span>

                                <span class="detail-value">
                                    {{ $item->status_tempat ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Nomor HP Siswa
                                </span>

                                <span class="detail-value">
                                    {{ $item->no_hp ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Nomor Telepon Orang Tua
                                </span>

                                <span class="detail-value">
                                    {{ $item->no_telp ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Alamat Email
                                </span>

                                <span class="detail-value">
                                    {{ $item->alamat_email ?: '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PENDIDIKAN --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-school mr-2"></i>
                        Data Pendidikan
                    </h6>

                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">Sekolah Asal</span>
                                <span class="detail-value">
                                    {{ $item->sekolah_asal ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="detail-label">Nilai Ijazah</span>
                                <span class="detail-value">
                                    {{ $item->nilai_ijazah ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MINAT DAN PRESTASI --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-trophy mr-2"></i>
                        Minat dan Prestasi
                    </h6>

                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Kegiatan Olahraga
                                </span>

                                <span class="detail-value">
                                    {{ $item->kegiatan_olahraga ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Kegiatan Kesenian
                                </span>

                                <span class="detail-value">
                                    {{ $item->kegiatan_kesenian ?: '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="detail-item">
                                <span class="detail-label">
                                    Prestasi yang Dicapai
                                </span>

                                <span class="detail-value">
                                    {{ $item->prestasi ?: '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DATA ORANG TUA/WALI --}}
                <div class="detail-section">
                    <h6 class="detail-section-title">
                        <i class="fas fa-users mr-2"></i>
                        Data Orang Tua/Wali
                    </h6>

                    @include('home.admin.siswa.wali')
                </div>
            </div>

            {{-- FOOTER MODAL --}}
            <div class="modal-footer">
                <button class="btn btn-secondary px-4"
                    type="button"
                    data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>