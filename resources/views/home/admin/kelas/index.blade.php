@extends('layouts.app', ['title' => 'Kelas'])
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Jurusan Dan Kuota</h6>
                        </div>
                        <div class="col-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKelas">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Deskripsi Jurusan</th>
                                    <th>Kuota Tersedia</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                                @foreach ($kelas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_jurusan }}</td>
                                        <td>{{ $item->deskripsi_jurusan }}</td>
                                        <td>{{ $item->kuota_tersedia }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-circle btn-sm"
                                                data-toggle="modal" data-target="#editKelas-{{ $loop->iteration }}">
                                                <i class="fas fa-pencil"></i>
                                            </button>
                                            <a href="{{ route('admin.kelas.destroy', $item->id) }}">
                                                <button type="button" class="btn btn-danger btn-circle btn-sm"
                                                    onclick="confirm('Anda yakin untuk menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </a>
                                            @include('home.admin.kelas.modal')
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
    <!-- Logout Modal-->
    <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('admin.kelas.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="" class="form-control"
                                placeholder="nama_jurusan" value="{{ $item->nama_jurusan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Jurusan</label>
                            <input type="text" name="deskripsi_jurusan" id="" class="form-control"
                                placeholder="deskripsi_jurusan" value="{{ $item->deskripsi_jurusan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kuota Tersedia</label>
                            <input type="number" name="kuota_tersedia" id="" class="form-control"
                                placeholder="kuota_tersedia" value="{{ $item->kuota_tersedia }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
