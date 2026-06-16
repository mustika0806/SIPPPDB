@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 text-success font-weight-bold">Data Seleksi Wawancara</h4>
                <small class="text-muted">Kelola jadwal dan hasil wawancara calon peserta didik</small>
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
                    <thead class="bg-success text-white text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Wawancara</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Link / Lokasi</th>
                            <th>Nilai</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>WhatsApp</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($interviews as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $item->user->name ?? '-' }}</strong>
                                </td>

                                <td class="text-center">
                                    @if($item->interview_type == 'online')
                                        <span class="badge badge-primary">Online</span>
                                    @elseif($item->interview_type == 'offline')
                                        <span class="badge badge-success">Offline</span>
                                    @else
                                        <span class="badge badge-secondary">Belum Ditentukan</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if($item->interview_date)
                                        {{ \Carbon\Carbon::parse($item->interview_date)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{ $item->interview_time ?? '-' }}
                                </td>

                                <td>
                                    @if($item->interview_type == 'online')
                                        @if($item->meeting_link)
                                            <a href="{{ $item->meeting_link }}" target="_blank" class="btn btn-primary btn-sm">
                                                Buka Link
                                            </a>
                                        @else
                                            <span class="text-muted">Link belum tersedia</span>
                                        @endif

                                    @elseif($item->interview_type == 'offline')
                                        {{ $item->interview_place ?? 'Lokasi belum tersedia' }}

                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if($item->score !== null)
                                        <span class="badge badge-info p-2">{{ $item->score }}</span>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>{{ $item->notes ?? '-' }}</td>

                                <td class="text-center">
                                    @if($item->status == 'lulus')
                                        <span class="badge badge-success">Lulus</span>
                                    @elseif($item->status == 'tidak_lulus')
                                        <span class="badge badge-danger">Tidak Lulus</span>
                                    @elseif($item->status == 'terjadwal')
                                        <span class="badge badge-info">Terjadwal</span>
                                    @else
                                        <span class="badge badge-secondary">Belum</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if($item->user && $item->whatsapp_number)
                                        <a href="https://wa.me/{{ $item->whatsapp_number }}"
                                           target="_blank"
                                           class="btn btn-success btn-sm">
                                            <i class="fab fa-whatsapp"></i> Kirim {{ $item->whatsapp_number }}
                                        </a>
                                    @else
                                        <span class="text-muted">Nomor tidak ada</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('admin.interview.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.interview.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted py-4">
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