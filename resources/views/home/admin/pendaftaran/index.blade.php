@extends('layouts.app', ['title' => 'Jadwal Pendaftaran'])

@section('content')
<style>
    .jadwal-page {
        width: 100%;
        max-width: 100%;
        min-width: 0;
    }

    .jadwal-card {
        overflow: hidden;
        border: 0;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(58, 59, 69, 0.08);
    }

    .jadwal-card-header {
        display: flex;
        padding: 18px 20px;
        align-items: center;
        justify-content: space-between;
        background: #ffffff;
        border-bottom: 1px solid #e8ebf2;
    }

    .jadwal-title {
        margin: 0;
        color: #313752;
        font-size: 19px;
        font-weight: 700;
    }

    .jadwal-subtitle {
        margin-top: 4px;
        margin-bottom: 0;
        color: #858796;
        font-size: 13px;
    }

    .btn-tambah-jadwal {
        padding: 10px 16px;
        border: 0;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.2);
    }

    .jadwal-table {
        min-width: 1750px;
        margin-bottom: 0;
        color: #4f5263;
        font-size: 14px;
    }

    .jadwal-table thead th {
        padding: 14px 12px;
        color: #5a5c69;
        background: #f5f7fb;
        border-color: #e3e6f0;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
        white-space: normal;
        vertical-align: middle;
    }

    .jadwal-table tbody td {
        padding: 13px 12px;
        border-color: #e3e6f0;
        vertical-align: middle;
    }

    .jadwal-table tbody tr:hover {
        background: #fafbfe;
    }

    .nomor-jadwal {
        display: inline-flex;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        color: #4e73df;
        background: rgba(78, 115, 223, 0.12);
        border-radius: 50%;
        font-weight: 700;
    }

    .gelombang-text {
        color: #313752;
        font-weight: 700;
        white-space: nowrap;
    }

    .tanggal-jadwal {
        color: #5a5c69;
        white-space: nowrap;
    }

    .tahun-akademik {
        color: #313752;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-belum {
        color: #856404;
        background: #fff3cd;
    }

    .status-pendaftaran {
        color: #155724;
        background: #d4edda;
    }

    .status-seleksi {
        color: #004085;
        background: #cce5ff;
    }

    .status-pengumuman {
        color: #0c5460;
        background: #d1ecf1;
    }

    .status-selesai {
        color: #721c24;
        background: #f8d7da;
    }

    .status-menunggu {
        color: #383d41;
        background: #e2e3e5;
    }

    .status-nonaktif {
        color: #721c24;
        background: #f8d7da;
    }

    .status-admin {
        display: block;
        margin-top: 5px;
        color: #858796;
        font-size: 11px;
        white-space: nowrap;
    }

    .aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-aksi {
        display: inline-flex;
        width: 34px;
        height: 34px;
        padding: 0;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .empty-jadwal {
        padding: 45px !important;
        color: #858796;
        font-size: 14px;
        text-align: center;
    }

    .empty-jadwal i {
        display: block;
        margin-bottom: 10px;
        font-size: 35px;
    }

    .modal-section-title {
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1px solid #e8ebf2;
        font-size: 15px;
        font-weight: 700;
    }

    @media (max-width: 767.98px) {
        .jadwal-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-tambah-jadwal {
            width: 100%;
            margin-top: 15px;
        }
    }
</style>

<div class="container-fluid jadwal-page">

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i>
            {{ session('success') }}

            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Tutup"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Pesan gagal --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle mr-1"></i>
            {{ session('error') }}

            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Tutup"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card jadwal-card mb-4">

        <div class="jadwal-card-header">

            <div>
                <h4 class="jadwal-title">
                    <i class="fas fa-calendar-alt text-primary mr-1"></i>
                    Halaman Jadwal Pendaftaran
                </h4>

                <p class="jadwal-subtitle">
                    Kelola jadwal pendaftaran, seleksi, dan pengumuman PPDB.
                </p>
            </div>

            <button
                type="button"
                class="btn btn-primary btn-tambah-jadwal"
                data-toggle="modal"
                data-target="#tambahPendaftaran"
            >
                <i class="fas fa-plus mr-1"></i>
                Tambah Jadwal
            </button>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table
                    class="table table-bordered table-hover jadwal-table"
                    id="table"
                    width="100%"
                    cellspacing="0"
                >
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th>Gelombang</th>
                            <th>Tanggal Buka Pendaftaran</th>
                            <th>Tanggal Akhir Pendaftaran</th>
                            <th>Tanggal Buka Seleksi</th>
                            <th>Tanggal Akhir Seleksi</th>
                            <th>Tanggal Buka Pengumuman</th>
                            <th>Tanggal Akhir Pengumuman</th>
                            <th>Tahun Akademik</th>
                            <th>Status</th>
                            <th width="8%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pendaftaran as $item)

                            @php
                                $statusJadwal = $item->status_jadwal;

                                $kelasStatus = match ($statusJadwal) {
                                    'Belum Dibuka' =>
                                        'status-belum',

                                    'Pendaftaran Dibuka' =>
                                        'status-pendaftaran',

                                    'Tahap Seleksi' =>
                                        'status-seleksi',

                                    'Tahap Pengumuman' =>
                                        'status-pengumuman',

                                    'Sudah Berakhir' =>
                                        'status-selesai',

                                    'Tidak Aktif' =>
                                        'status-nonaktif',

                                    default =>
                                        'status-menunggu',
                                };
                            @endphp

                            <tr>
                                <td class="text-center">
                                    <span class="nomor-jadwal">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>
                                    <span class="gelombang-text">
                                        {{ $item->gelombang ?? '-' }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_buka_pendaftaran
                                            ? $item->tanggal_buka_pendaftaran->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_akhir_pendaftaran
                                            ? $item->tanggal_akhir_pendaftaran->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_buka_seleksi
                                            ? $item->tanggal_buka_seleksi->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_akhir_seleksi
                                            ? $item->tanggal_akhir_seleksi->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_buka_pengumuman
                                            ? $item->tanggal_buka_pengumuman->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tanggal-jadwal">
                                        {{ $item->tanggal_akhir_pengumuman
                                            ? $item->tanggal_akhir_pengumuman->format('d-m-Y')
                                            : '-'
                                        }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="tahun-akademik">
                                        {{ $item->tahun_akademik ?? '-' }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="status-badge {{ $kelasStatus }}">
                                        {{ $statusJadwal }}
                                    </span>

                                    <span class="status-admin">
                                        Status admin:
                                        {{ $item->status ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="aksi-wrapper">

                                        <button
                                            type="button"
                                            class="btn btn-warning btn-aksi"
                                            data-toggle="modal"
                                            data-target="#editPendaftaran-{{ $loop->iteration }}"
                                            title="Edit jadwal"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <a
                                            href="{{ route(
                                                'admin.pendaftaran.destroy',
                                                $item->id
                                            ) }}"
                                            class="btn btn-danger btn-aksi"
                                            title="Hapus jadwal"
                                            onclick="return confirm(
                                                'Anda yakin ingin menghapus jadwal ini?'
                                            );"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </div>

                                    @include('home.admin.pendaftaran.modal')
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="11" class="empty-jadwal">
                                    <i class="fas fa-calendar-times"></i>
                                    Belum ada jadwal pendaftaran.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

{{-- Modal Tambah Jadwal --}}
<div
    class="modal fade"
    id="tambahPendaftaran"
    tabindex="-1"
    role="dialog"
    aria-labelledby="tambahPendaftaranLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-primary text-white">

                <h5
                    class="modal-title font-weight-bold"
                    id="tambahPendaftaranLabel"
                >
                    <i class="fas fa-calendar-plus mr-1"></i>
                    Tambah Jadwal Pendaftaran
                </h5>

                <button
                    type="button"
                    class="close text-white"
                    data-dismiss="modal"
                    aria-label="Tutup"
                >
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form
                action="{{ route('admin.pendaftaran.store') }}"
                method="POST"
            >
                @csrf

                <div class="modal-body">

                    {{-- Gelombang --}}
                    <div class="form-group">

                        <label
                            for="gelombang"
                            class="font-weight-bold"
                        >
                            Gelombang
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="gelombang"
                            id="gelombang"
                            class="form-control
                                @error('gelombang') is-invalid @enderror"
                            value="{{ old('gelombang') }}"
                            placeholder="Contoh: Gelombang 1"
                            required
                        >

                        @error('gelombang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <h6 class="modal-section-title text-primary">
                        <i class="fas fa-user-plus mr-1"></i>
                        Jadwal Pendaftaran
                    </h6>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_buka_pendaftaran"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Pendaftaran
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_pendaftaran"
                                    id="tanggal_buka_pendaftaran"
                                    class="form-control
                                        @error('tanggal_buka_pendaftaran')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_pendaftaran'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_pendaftaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_pendaftaran"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Pendaftaran
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_pendaftaran"
                                    id="tanggal_akhir_pendaftaran"
                                    class="form-control
                                        @error('tanggal_akhir_pendaftaran')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_pendaftaran'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_pendaftaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <h6 class="modal-section-title text-success">
                        <i class="fas fa-clipboard-check mr-1"></i>
                        Jadwal Seleksi
                    </h6>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_buka_seleksi"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Seleksi
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_seleksi"
                                    id="tanggal_buka_seleksi"
                                    class="form-control
                                        @error('tanggal_buka_seleksi')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_seleksi'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_seleksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_seleksi"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Seleksi
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_seleksi"
                                    id="tanggal_akhir_seleksi"
                                    class="form-control
                                        @error('tanggal_akhir_seleksi')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_seleksi'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_seleksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <h6 class="modal-section-title text-info">
                        <i class="fas fa-bullhorn mr-1"></i>
                        Jadwal Pengumuman
                    </h6>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_buka_pengumuman"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Pengumuman
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_pengumuman"
                                    id="tanggal_buka_pengumuman"
                                    class="form-control
                                        @error('tanggal_buka_pengumuman')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_pengumuman'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_pengumuman"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Pengumuman
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_pengumuman"
                                    id="tanggal_akhir_pengumuman"
                                    class="form-control
                                        @error('tanggal_akhir_pengumuman')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_pengumuman'
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <div class="row">

                        {{-- Tahun akademik --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="tahun_akademik"
                                    class="font-weight-bold"
                                >
                                    Tahun Akademik
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="tahun_akademik"
                                    id="tahun_akademik"
                                    class="form-control
                                        @error('tahun_akademik')
                                            is-invalid
                                        @enderror"
                                    value="{{ old('tahun_akademik') }}"
                                    placeholder="Contoh: 2026/2027"
                                    required
                                >

                                @error('tahun_akademik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label
                                    for="status"
                                    class="font-weight-bold"
                                >
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="form-control
                                        @error('status')
                                            is-invalid
                                        @enderror"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Status --
                                    </option>

                                    <option
                                        value="Aktif"
                                        {{ old('status', 'Aktif') === 'Aktif'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        Aktif
                                    </option>

                                    <option
                                        value="Tidak Aktif"
                                        {{ old('status') === 'Tidak Aktif'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        Tidak Aktif
                                    </option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        <i class="fas fa-times mr-1"></i>
                        Tutup
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-save mr-1"></i>
                        Simpan Jadwal
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        if ($.fn.DataTable) {
            $('#table').DataTable({
                scrollX: true,
                autoWidth: false,
                pageLength: 10,
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Belum ada data',
                    zeroRecords: 'Data tidak ditemukan',
                    emptyTable: 'Belum ada jadwal pendaftaran',
                    paginate: {
                        first: 'Pertama',
                        last: 'Terakhir',
                        next: 'Berikutnya',
                        previous: 'Sebelumnya'
                    }
                }
            });
        }
    });
</script>
@endpush