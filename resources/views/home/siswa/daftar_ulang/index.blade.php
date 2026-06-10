@extends('layouts.app', ['title' => 'Daftar Ulang'])

@section('content')
    @php
        use Illuminate\Support\Str;

        $sudahSubmit = isset($daftar_ulang) && $daftar_ulang->bukti_transfer;
    @endphp

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Halaman Pembayaran
                    </h6>
                </div>

                <div class="card-body">

                    {{-- ===================== --}}
                    {{-- JIKA SUDAH SUBMIT --}}
                    {{-- ===================== --}}
                    @if ($sudahSubmit)

                        @if ($daftar_ulang->status == 'Belum Bayar')
                            <div class="alert alert-warning">
                                Bukti pembayaran sedang diproses / menunggu verifikasi admin.
                            </div>
                        @endif

                        @if ($daftar_ulang->status == 'Sudah Bayar')
                            <div class="alert alert-success">
                                Pembayaran sudah diverifikasi.
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <td>Nama Siswa</td>
                                <td>{{ $daftar_ulang->user->name ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Kode Transaksi</td>
                                <td>{{ $daftar_ulang->code_transaksi }}</td>
                            </tr>

                            <tr>
                                <td>Nominal</td>
                                <td>Rp {{ number_format($daftar_ulang->nominal, 0, ',', '.') }}</td>
                            </tr>

                            <tr>
                                <td>Tanggal Pembayaran</td>
                                <td>{{ $daftar_ulang->tgl_daftar_ulang }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>
                                    <span class="badge bg-{{ $daftar_ulang->status == 'Sudah Bayar' ? 'success' : 'warning' }}">
                                        {{ $daftar_ulang->status }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>Bukti Transfer</td>
                                <td>
                                    <img src="{{ asset('storage/' . $daftar_ulang->bukti_transfer) }}" width="300"
                                        class="img-thumbnail">
                                </td>
                            </tr>
                        </table>

                        {{-- ===================== --}}
                        {{-- JIKA BELUM SUBMIT --}}
                        {{-- ===================== --}}
                    @else

                        <form action="{{ route('siswa.daftar_ulang.store', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Kode Transaksi</label>
                                <input type="text" class="form-control" name="code_transaksi"
                                    value="{{ Str::upper(Str::random(16)) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal" value="150000" readonly>
                            </div>

                            <div class="form-group">
                                <label>Upload Bukti Transfer (JPG/PNG)</label>
                                <input type="file" name="bukti_transfer"
                                    class="form-control @error('bukti_transfer') is-invalid @enderror" accept="image/*"
                                    required>

                                @error('bukti_transfer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        <button type="submit"
                                class="btn btn-{{ isset($daftar_ulang) ? 'warning' : 'primary' }} mt-3">{{ isset($daftar_ulang) ? 'Update Data' : 'Lanjut' }}</button>
                       
                        @if (isset($daftar_ulang) && $daftar_ulang->status == 'Belum Bayar')
                            <div class="form-group">
                                <label for="status">Status Bayar</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <ul class="mt-3 text-danger">
                                <li>Setelah melakukan Scan QRBARCODE pilih di status bayar menjadi "Sudah Bayar" maka
                                    otomatis status pembayaran berubah menjadi Sudah Bayar tanda nya pembayaran berhasil dan
                                    data pembayaran sudah masuk ke sistem admin</li>
                            </ul>
                            <button type="submit"
                                class="btn btn-{{ isset($daftar_ulang) ? 'warning' : 'primary' }} mt-3">{{ isset($daftar_ulang) ? 'Update Data' : 'Daftar Ulang' }}</button>
                        @endif
                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection