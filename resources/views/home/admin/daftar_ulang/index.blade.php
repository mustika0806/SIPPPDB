@extends('layouts.app', ['title' => 'Daftar Ulang'])
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Halaman Pembayaran</h6>
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
                                    <th>Nama Siswa</th>
                                    <th>Kode Transaksi</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Status Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($daftar_ulang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->siswa->user->name . ' -  ' . $item->siswa->kelas->nama_jurusan }}
                                        </td>
                                        <td>{!! DNS2D::getBarcodeHTML($item->code_transaksi, 'QRCODE', 5, 5) !!}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>{{ $item->tgl_daftar_ulang }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>@if($item->bukti_transfer)
                                            <img src="{{ asset('storage/' . $item->bukti_transfer) }}" width="200">
                                            @else
                                            Tidak ada bukti pembayaran.
                                            @endif
                                        </td>
                                        <td>
                                            <!-- ✅ Approve -->
                                            <form action="{{ route('siswa.admin.daftar_ulang.approve', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-success btn-sm" onclick="return confirm('Approve pembayaran ini?')">
                                                    Approve
                                                </button>
                                            </form>

                                            <!-- ❌ Tolak -->
                                            <form action="{{ route('siswa.admin.daftar_ulang.tolak', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak & hapus data ini?')">
                                                    Tolak
                                                </button>
                                            </form>
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
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endpush