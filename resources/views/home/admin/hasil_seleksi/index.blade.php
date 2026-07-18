@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 text-success font-weight-bold">
                    Data Hasil Akhir
                </h4>

                <small class="text-muted">
                    Rekapitulasi data seleksi berdasarkan jurusan dan total nilai tertinggi calon peserta didik.
                </small>
            </div>

            <form action="{{ route('admin.hasil_akhir.proses-semua') }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin melakukan rekapitulasi semua data seleksi?')">
                @csrf

                <button type="submit" class="btn btn-success">
                    Rekapitulasi Semua
                </button>
            </form>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="alert alert-info">
                <strong>Ketentuan Rekapitulasi:</strong>
                <ul class="mb-0 mt-2">
                    <li>Nilai Raport / Nilai Rata-rata: 40%</li>
                    <li>Nilai Tes Al-Qur’an: 30%</li>
                    <li>Nilai Wawancara: 30%</li>
                    <li>Total nilai dihitung dari gabungan ketiga komponen tersebut.</li>
                    <li>Siswa dikelompokkan berdasarkan jurusan.</li>
                    <li>Siswa diurutkan dari total nilai tertinggi sampai terendah pada masing-masing jurusan.</li>
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Siswa</th>
                            <th>Peringkat</th>
                            <th>Nilai Raport</th>
                            <th>Nilai Qur’an</th>
                            <th>Nilai Wawancara</th>
                            <th>Total Nilai</th>
                            <th>Status</th>
                            <!-- <th width="15%">Aksi</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siswas->groupBy(function ($siswa) {
                            return $siswa->kelas->nama_jurusan ?? 'Belum Memilih Jurusan';
                        }) as $jurusan => $dataSiswa)

                            <tr>
                                <td colspan="9"
                                    class="bg-success text-white font-weight-bold text-center"
                                    style="font-size: 15px;">
                                    Jurusan: {{ $jurusan }}
                                </td>
                            </tr>

                            @foreach($dataSiswa->sortByDesc(function ($siswa) {
                                return $siswa->total_nilai ?? -1;
                            })->values() as $index => $siswa)

                                @php
                                    $nilaiLengkap =
                                        $siswa->nilai_rata !== null &&
                                        $siswa->nilai_quran !== null &&
                                        $siswa->nilai_wawancara !== null;

                                    $peringkat = $siswa->total_nilai !== null ? $index + 1 : null;
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $siswa->user->name ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if($peringkat)
                                            <span class="badge badge-primary">
                                                {{ $peringkat }}
                                            </span>
                                        @else
                                            <span class="text-muted">
                                                -
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($siswa->nilai_rata !== null)
                                            {{ $siswa->nilai_rata }}
                                        @else
                                            <span class="text-danger">
                                                Belum ada
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($siswa->nilai_quran !== null)
                                            {{ $siswa->nilai_quran }}
                                        @else
                                            <span class="text-danger">
                                                Belum ada
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($siswa->nilai_wawancara !== null)
                                            {{ $siswa->nilai_wawancara }}
                                        @else
                                            <span class="text-danger">
                                                Belum ada
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($siswa->total_nilai !== null)
                                            <strong>
                                                {{ number_format($siswa->total_nilai, 2) }}
                                            </strong>
                                        @else
                                            <span class="text-muted">
                                                Belum diproses
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($siswa->total_nilai === null)
                                            <span class="badge badge-secondary">
                                                Belum Diproses
                                            </span>
                                        @elseif($siswa->status == 'Diterima')
                                            <span class="badge badge-success">
                                                Diterima
                                            </span>
                                        @elseif($siswa->status == 'Tidak Diterima')
                                            <span class="badge badge-danger">
                                                Tidak Diterima
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                {{ $siswa->status ?? 'Menunggu' }}
                                            </span>
                                        @endif
                                    </td>

                                    <!-- <td class="text-center">
                                        @if($nilaiLengkap)
                                            <form action="{{ route('admin.hasil_akhir.proses', $siswa->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin melakukan rekapitulasi data berdasarkan jurusan dan peringkat nilai?')">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Rekapitulasi Data
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                Nilai Belum Lengkap
                                            </button>
                                        @endif
                                    </td> -->
                                </tr>
                            @endforeach

                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    Belum ada data siswa.
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