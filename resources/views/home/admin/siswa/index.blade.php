@extends('layouts.app', ['title' => 'Siswa Baru'])

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">

                {{-- HEADER --}}
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Halaman Data Pendaftar
                            </h6>
                        </div>
                    </div>
                </div>

                {{-- ISI --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"
                            id="table"
                            width="100%"
                            cellspacing="0">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Biodata</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($siswa as $item)
                                    <tr>
                                        {{-- NOMOR --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- NAMA --}}
                                        <td>
                                            {{ optional($item->user)->name ?? '-' }}
                                        </td>

                                        {{-- JURUSAN --}}
                                        <td>
                                            {{ optional($item->kelas)->nama_jurusan ?? '-' }}
                                        </td>

                                        {{-- BIODATA --}}
                                        <td class="text-nowrap">
                                            {{-- Lihat biodata --}}
                                            <button type="button"
                                                class="btn btn-warning btn-circle btn-sm"
                                                data-toggle="modal"
                                                data-target="#detailSiswa-{{ $loop->iteration }}"
                                                title="Lihat Biodata">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            @include('home.admin.siswa.modal')

                                            {{-- Cetak biodata --}}
                                            @if ($item->status == 'Diterima')
                                                <a href="{{ route('admin.siswa.cetak', $item->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm text-decoration-none"
                                                    title="Cetak Biodata"
                                                    target="_blank">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            @endif
                                        </td>

                                        {{-- DOKUMEN --}}
                                        <td class="text-nowrap">
                                            {{-- Lihat dokumen --}}
                                            <button type="button"
                                                class="btn btn-warning btn-circle btn-sm"
                                                data-toggle="modal"
                                                data-target="#dokumenSiswa-{{ $loop->iteration }}"
                                                title="Lihat Dokumen">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            @include('home.admin.siswa.dokumen')

                                            {{-- Cetak dokumen --}}
                                            @if (
                                                isset($item->dokumen_siswa) &&
                                                $item->dokumen_siswa->status == 'Diterima'
                                            )
                                                <a href="{{ route('admin.siswa.dokumen_cetak', $item->id) }}"
                                                    class="btn btn-primary btn-circle btn-sm text-decoration-none"
                                                    title="Cetak Dokumen"
                                                    target="_blank">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            @endif
                                        </td>

                                        {{-- STATUS --}}
                                        <td>
                                            @if ($item->status == 'Diterima')
                                                <span class="badge badge-success">
                                                    Diterima
                                                </span>
                                            @elseif ($item->status == 'Tidak Diterima')
                                                <span class="badge badge-danger">
                                                    Tidak Diterima
                                                </span>
                                            @elseif ($item->status == 'Perbaiki Data')
                                                <span class="badge badge-info">
                                                    Perbaiki Data
                                                </span>
                                            @elseif ($item->status == 'Perbaiki Dokumen')
                                                <span class="badge badge-warning">
                                                    Perbaiki Dokumen
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    {{ $item->status }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- AKSI --}}
                                        <td class="text-nowrap">

                                            {{-- MENUNGGU KONFIRMASI --}}
                                            @if ($item->status == 'Menunggu Konfirmasi')
                                                {{-- Terima siswa --}}
                                                <a href="{{ route('admin.siswa.confirmation', $item->id) }}"
                                                    class="btn btn-success btn-circle btn-sm text-decoration-none"
                                                    title="Terima Siswa"
                                                    onclick="return confirm('Anda yakin ingin menerima siswa ini?')">
                                                    <i class="fas fa-check"></i>
                                                </a>

                                                {{-- Tolak siswa --}}
                                                <a href="{{ route('admin.siswa.notconfirm', $item->id) }}"
                                                    class="btn btn-warning btn-circle btn-sm text-decoration-none"
                                                    title="Tolak Siswa"
                                                    onclick="return confirm('Anda yakin ingin menolak siswa ini?')">
                                                    <i class="fas fa-times"></i>
                                                </a>

                                                {{-- Perbaiki data --}}
                                                <a href="{{ route('admin.siswa.perbaiki_data', $item->id) }}"
                                                    class="btn btn-info btn-circle btn-sm text-decoration-none"
                                                    title="Perbaiki Data">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                {{-- Perbaiki dokumen --}}
                                                @isset($item->dokumen_siswa)
                                                    @if ($item->dokumen_siswa->status != 'Perbaiki Dokumen')
                                                        <a href="{{ route('admin.siswa.perbaiki_dokumen', $item->id) }}"
                                                            class="btn btn-warning btn-circle btn-sm text-decoration-none"
                                                            title="Perbaiki Dokumen">
                                                            <i class="fas fa-file-signature"></i>
                                                        </a>
                                                    @endif
                                                @endisset
                                            @endif

                                            {{-- STATUS DITERIMA --}}
                                            @if ($item->status == 'Diterima')
                                                <a href="{{ route('admin.siswa.notconfirm', $item->id) }}"
                                                    class="btn btn-warning btn-circle btn-sm text-decoration-none"
                                                    title="Batalkan Penerimaan"
                                                    onclick="return confirm('Anda yakin ingin membatalkan penerimaan siswa ini?')">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            @endif

                                            {{-- STATUS TIDAK DITERIMA --}}
                                            @if ($item->status == 'Tidak Diterima')
                                                {{-- Terima kembali --}}
                                                <a href="{{ route('admin.siswa.confirmation', $item->id) }}"
                                                    class="btn btn-success btn-circle btn-sm text-decoration-none"
                                                    title="Terima Siswa"
                                                    onclick="return confirm('Anda yakin ingin menerima siswa ini?')">
                                                    <i class="fas fa-check"></i>
                                                </a>

                                                {{-- Perbaiki data --}}
                                                <a href="{{ route('admin.siswa.perbaiki_data', $item->id) }}"
                                                    class="btn btn-info btn-circle btn-sm text-decoration-none"
                                                    title="Perbaiki Data">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                {{-- Perbaiki dokumen --}}
                                                @isset($item->dokumen_siswa)
                                                    @if ($item->dokumen_siswa->status != 'Perbaiki Dokumen')
                                                        <a href="{{ route('admin.siswa.perbaiki_dokumen', $item->id) }}"
                                                            class="btn btn-warning btn-circle btn-sm text-decoration-none"
                                                            title="Perbaiki Dokumen">
                                                            <i class="fas fa-file-signature"></i>
                                                        </a>
                                                    @endif
                                                @endisset
                                            @endif

                                            {{-- HAPUS SISWA --}}
                                            <a href="{{ route('admin.siswa.destroy', $item->id) }}"
                                                class="btn btn-danger btn-circle btn-sm text-decoration-none"
                                                title="Hapus Siswa"
                                                onclick="return confirm('Anda yakin ingin menghapus data siswa ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    zeroRecords: 'Data tidak ditemukan',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data',
                    infoFiltered: '(disaring dari _MAX_ total data)',
                    paginate: {
                        first: 'Pertama',
                        last: 'Terakhir',
                        next: 'Berikutnya',
                        previous: 'Sebelumnya'
                    }
                }
            });
        });
    </script>
@endpush