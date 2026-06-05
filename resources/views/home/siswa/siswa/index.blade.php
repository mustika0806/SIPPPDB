@extends('layouts.app', ['title' => 'Siswa Baru'])
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Pendaftar</h6>
                        </div>
                        <div class="col-right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->kelas->nama_jurusan }}</td>
                                        <td>{{ $item->status }}</td>
                                        {{-- aksi --}}
                                        @if ($item->status == 'Menunggu Konfirmasi')
                                            <a href="{{ route('admin.siswa.confirmation', $item->id) }}"
                                                class="text-decoration-none" title="Diterima">
                                            </a>
                                            <a href="{{ route('admin.siswa.notconfirm', $item->id) }}"
                                                class="text-decoration-none" title="Ditolak">
                                            </a>
                                            <a href="{{ route('admin.siswa.perbaiki_data', $item->id) }}"
                                                class="text-decoration-none" title="Perbaiki Data">
                                            </a>
                                            @isset($item->dokumen_siswa)
                                                @if ($item->dokumen_siswa->status != 'Perbaiki Dokumen')
                                                    <a href="{{ route('admin.siswa.perbaiki_dokumen', $item->id) }}"
                                                        class="text-decoration-none" title="Perbaiki Dokumen">
                                                    </a>
                                                @endif
                                            @endisset
                                        @endif
                                        @if ($item->status == 'Diterima')
                                            <a href="{{ route('admin.siswa.notconfirm', $item->id) }}"
                                                class="text-decoration-none">
                                            </a>
                                        @endif
                                        @if ($item->status == 'Tidak Diterima')
                                            <a href="{{ route('admin.siswa.confirmation', $item->id) }}"
                                                class="text-decoration-none">
                                                <button class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.siswa.perbaiki_data', $item->id) }}"
                                                class="text-decoration-none">
                                                <button class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-pencil"></i>
                                                </button>
                                            </a>
                                            @isset($item->dokumen_siswa)
                                                @if ($item->dokumen_siswa->status != 'Perbaiki Data')
                                                    <a href="{{ route('admin.siswa.perbaiki_dokumen', $item->id) }}"
                                                        class="text-decoration-none">
                                                        <button class="btn btn-warning btn-circle btn-sm">
                                                            <i class="fa-solid fa-file-signature"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            @endisset
                                        @endif
                                        <a
                                            href="{{ route('admin.siswa.destroy', $item->id) }}"class="text-decoration-none">
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
            $('#table').DataTable();
        });
    </script>
@endpush