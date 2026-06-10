@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 text-success font-weight-bold">Data Seleksi Wawancara</h4>
                <small class="text-muted">Kelola hasil wawancara calon peserta didik</small>
            </div>

            <a href="{{ route('admin.interview.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="bg-success text-white">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Wawancara</th>
                            <th>Nilai</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($interviews as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $item->user->name ?? '-' }}</strong>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->interview_date)->format('d-m-Y') }}</td>
                                <td>
                                    <span class="badge badge-info p-2">{{ $item->score }}</span>
                                </td>
                                <td>{{ $item->notes ?? '-' }}</td>
                                <td>
                                    @if($item->status == 'lulus')
                                        <span class="badge badge-success">Lulus</span>
                                    @elseif($item->status == 'tidak_lulus')
                                        <span class="badge badge-danger">Tidak Lulus</span>
                                    @else
                                        <span class="badge badge-secondary">Belum</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.interview.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.interview.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data wawancara.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection