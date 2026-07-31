@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0 text-success font-weight-bold">
                        Data Seleksi Wawancara
                    </h4>
                    <small class="text-muted">
                        Kelola jadwal, jadwal ulang, konfirmasi, dan hasil wawancara calon peserta didik
                    </small>
                </div>

                <a href="{{ route('admin.interview.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                    Tambah Jadwal
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="alert alert-info">
                    <strong>Catatan:</strong>
                    Jika terdapat perubahan hari, jam, link, atau lokasi wawancara, gunakan tombol
                    <strong>Jadwal Ulang</strong>. Jangan menambah jadwal baru untuk siswa yang sama agar data tidak dobel.
                </div>

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
                                <th>Konfirmasi ke Siswa</th>
                                <th width="18%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($interviews as $item)
                                                    @php
                                                        $namaSiswa = $item->user->name ?? '-';

                                                        $tanggalWawancara = $item->interview_date
                                                            ? \Carbon\Carbon::parse($item->interview_date)->format('d-m-Y')
                                                            : '-';

                                                        $jamWawancara = $item->interview_time
                                                            ? \Carbon\Carbon::parse($item->interview_time)->format('H:i')
                                                            : '-';

                                                        $jenisWawancara = $item->interview_type == 'online'
                                                            ? 'Online'
                                                            : ($item->interview_type == 'offline' ? 'Offline' : 'Belum ditentukan');

                                                        if ($item->interview_type == 'online') {
                                                            $linkAtauLokasi = $item->meeting_link ?? 'Link belum tersedia';
                                                        } elseif ($item->interview_type == 'offline') {
                                                            $linkAtauLokasi = $item->interview_place ?? 'Lokasi belum tersedia';
                                                        } else {
                                                            $linkAtauLokasi = '-';
                                                        }

                                                        /*
                                                        |--------------------------------------------------------------------------
                                                        | Ambil Nomor WA dari Data Siswa/User
                                                        |--------------------------------------------------------------------------
                                                        */

                                                        $siswaData = \App\Models\Siswa::where('user_id', $item->user_id)->first();

                                                        $nomorWa = $siswaData->no_hp
                                                            ?? $siswaData->nomor_hp
                                                            ?? $siswaData->no_telepon
                                                            ?? $siswaData->no_telp
                                                            ?? $siswaData->telepon
                                                            ?? $siswaData->hp
                                                            ?? $siswaData->whatsapp
                                                            ?? $siswaData->whatsapp_number
                                                            ?? $item->user->no_hp
                                                            ?? $item->user->nomor_hp
                                                            ?? $item->user->no_telepon
                                                            ?? $item->user->phone
                                                            ?? $item->user->whatsapp
                                                            ?? $item->user->whatsapp_number
                                                            ?? null;

                                                        $nomorWa = preg_replace('/[^0-9]/', '', $nomorWa ?? '');

                                                        if (!empty($nomorWa)) {
                                                            if (substr($nomorWa, 0, 1) == '0') {
                                                                $nomorWa = '62' . substr($nomorWa, 1);
                                                            } elseif (substr($nomorWa, 0, 1) == '8') {
                                                                $nomorWa = '62' . $nomorWa;
                                                            }
                                                        }

                                                        /*
                                                        |--------------------------------------------------------------------------
                                                        | Cek Kelengkapan Jadwal
                                                        |--------------------------------------------------------------------------
                                                        */

                                                        $jadwalLengkap = !empty($item->interview_date)
                                                            && !empty($item->interview_time)
                                                            && in_array($item->interview_type, ['online', 'offline']);

                                                        if ($item->interview_type == 'online' && empty($item->meeting_link)) {
                                                            $jadwalLengkap = false;
                                                        }

                                                        if ($item->interview_type == 'offline' && empty($item->interview_place)) {
                                                            $jadwalLengkap = false;
                                                        }

                                                        $pesanWa =
                                                            "Assalamu'alaikum, " . $namaSiswa . ".\n\n" .
                                                            "Kami dari Panitia PPDB SMKS Ma'arif NU Kota Batam ingin menginformasikan jadwal seleksi wawancara Anda:\n\n" .
                                                            "Jenis Wawancara: " . $jenisWawancara . "\n" .
                                                            "Tanggal: " . $tanggalWawancara . "\n" .
                                                            "Jam: " . $jamWawancara . "\n" .
                                                            "Link/Lokasi: " . $linkAtauLokasi . "\n\n" .
                                                            "Apabila terdapat perubahan jadwal, panitia akan menghubungi kembali melalui WhatsApp.\n\n" .
                                                            "Mohon hadir tepat waktu dan mengikuti arahan panitia. Terima kasih.";
                                                    @endphp

                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $loop->iteration }}
                                                        </td>

                                                        <td>
                                                            <strong>{{ $namaSiswa }}</strong>
                                                        </td>

                                                        <td class="text-center">
                                                            @if($item->interview_type == 'online')
                                                                <span class="badge badge-primary">
                                                                    Online
                                                                </span>
                                                            @elseif($item->interview_type == 'offline')
                                                                <span class="badge badge-success">
                                                                    Offline
                                                                </span>
                                                            @else
                                                                <span class="badge badge-secondary">
                                                                    Belum Ditentukan
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            {{ $tanggalWawancara }}
                                                        </td>

                                                        <td class="text-center">
                                                            {{ $jamWawancara }}
                                                        </td>

                                                        <td>
                                                            @if($item->interview_type == 'online')
                                                                @if($item->meeting_link)
                                                                    <a href="{{ $item->meeting_link }}" target="_blank" class="btn btn-primary btn-sm">
                                                                        Buka Link
                                                                    </a>
                                                                @else
                                                                    <span class="text-muted">
                                                                        Link belum tersedia
                                                                    </span>
                                                                @endif
                                                            @elseif($item->interview_type == 'offline')
                                                                {{ $item->interview_place ?? 'Lokasi belum tersedia' }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            @if($item->score !== null)
                                                                <span class="badge badge-info p-2">
                                                                    {{ $item->score }}
                                                                </span>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $item->notes ?? '-' }}
                                                        </td>

                                                        <td class="text-center">
    @if ($item->status == 'lulus')
        <span class="badge badge-success p-2">
            Lulus
        </span>
    @elseif ($item->status == 'tidak_lulus')
        <span class="badge badge-danger p-2">
            Tidak Lulus
        </span>
    @elseif ($item->status == 'terjadwal')
        <span class="badge badge-info p-2">
            Terjadwal
        </span>
    @elseif ($item->status == 'dibatalkan')
        <span class="badge badge-danger p-2">
            <i class="fas fa-calendar-times mr-1"></i>
            Dibatalkan
        </span>
    @else
        <span class="badge badge-secondary p-2">
            Belum
        </span>
    @endif
</td>

                                                        <td class="text-center">
                                                            @if(empty($nomorWa))
                                                                <span class="text-muted">
                                                                    Nomor tidak ada
                                                                </span>
                                                            @elseif(!$jadwalLengkap)
                                                                <span class="badge badge-warning">
                                                                    Lengkapi Jadwal
                                                                </span>
                                                            @else
                                                                <a href="https://wa.me/{{ $nomorWa }}?text={{ urlencode($pesanWa) }}" target="_blank"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fab fa-whatsapp"></i>
                                                                    Konfirmasi ke Siswa
                                                                </a>

                                                                <br>

                                                                <small class="text-muted">
                                                                    {{ $nomorWa }}
                                                                </small>
                                                            @endif
                                                        </td>

                                                      <td class="text-center">
    <div class="d-flex flex-column align-items-center">

        {{-- EDIT NILAI DAN CATATAN --}}
        <a href="{{ route('admin.interview.edit', [
                'interview' => $item->id,
                'mode' => 'hasil'
            ]) }}"
            class="btn btn-primary btn-sm mb-2"
            style="width: 140px;"
            title="Edit nilai dan catatan wawancara">

            <i class="fas fa-edit mr-1"></i>
            Edit Hasil
        </a>

        {{-- JADWAL ULANG --}}
        <a href="{{ route('admin.interview.edit', [
                'interview' => $item->id,
                'mode' => 'jadwal'
            ]) }}"
            class="btn btn-warning btn-sm mb-2"
            style="width: 140px;"
            title="Ubah jadwal wawancara">

            <i class="fas fa-calendar-alt mr-1"></i>
            Jadwal Ulang
        </a>

        {{-- BATALKAN JADWAL --}}
        @if ($item->status != 'dibatalkan')
            <form
                action="{{ route(
                    'admin.interview.batalkan',
                    $item->id
                ) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin membatalkan jadwal wawancara ini?')">

                @csrf

                <button type="submit"
                    class="btn btn-danger btn-sm"
                    style="width: 140px;"
                    title="Batalkan jadwal wawancara">

                    <i class="fas fa-calendar-times mr-1"></i>
                    Batalkan Jadwal
                </button>
            </form>
        @else
            <span class="text-danger small">
                Jadwal telah dibatalkan
            </span>
        @endif
    </div>
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