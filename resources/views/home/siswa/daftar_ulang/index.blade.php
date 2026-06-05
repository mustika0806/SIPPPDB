@extends('layouts.app', ['title' => 'Daftar Ulang'])
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Halaman Pembayaran</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.daftar_ulang.store', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($daftar_ulang))
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Nama Siswa</td>
                                        <td>{{ $daftar_ulang->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Transaksi</td>
                                        <td>{{ $daftar_ulang->code_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td>{{ $daftar_ulang->nominal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pembayaran</td>
                                        <td>{{ $daftar_ulang->tgl_daftar_ulang }}</td>
                                    </tr>
                                    <tr>
                                        <label for="bukti_transfer">Upload Bukti Transfer (JPG/PNG)</label>
                                        <input type="file"
                                            class="form-control @error('bukti_transfer') is-invalid @enderror"
                                            name="bukti_transfer" id="bukti_transfer" accept="image/png, image/jpeg">
                                        @error('bukti_transfer')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </tr>
                                </table>
                            </div>
                        @endif
                        @if (!isset($daftar_ulang))
                            <div class="form-group">
                                <label for="code_transaksi">Kode Transaksi</label>
                                <input type="text" class="form-control @error('code_transaksi') is-invalid @enderror"
                                    name="code_transaksi" id="code_transaksi" placeholder="Kode Transaksi"
                                    value="{{ Str::upper(Str::random(16)) }}" readonly>
                                @error('code_transaksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="nominal">Jumlah</label>
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                    name="nominal" id="nominal" placeholder="Nominal" value=200000 readonly>
                                @error('nominal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <ul class="mt-3 text-danger">
                                <li>Mohon inputkan jumlah pembayaran dengan benar</li>
                                <li>Pilih di status bayar yaitu "Belum Bayar" sebelum melakukan Scan QRARCODE pada halaman
                                    selanjutnya</li>
                                <li>Setelah melakukan Scan QRBARCODE pilih di status bayar menjadi "Sudah Bayar" maka
                                    otomatis status pembayaran berubah menjadi Sudah Bayar tanda nya pembayaran berhasil dan
                                    data pembayaran sudah masuk ke sistem admin</li>
                            </ul>
                            <button type="submit"
                                class="btn btn-{{ isset($daftar_ulang) ? 'warning' : 'primary' }} mt-3">{{ isset($daftar_ulang) ? 'Update Data' : 'Lanjut' }}</button>
                        @endif
                        @if (isset($daftar_ulang) && $daftar_ulang->status == 'Belum Bayar')
                            <ul class="mt-3 text-danger">
                                <li>Setelah melakukan Scan QRBARCODE pilih di status bayar menjadi "Sudah Bayar" maka
                                    otomatis status pembayaran berubah menjadi Sudah Bayar tanda nya pembayaran berhasil dan
                                    data pembayaran sudah masuk ke sistem admin</li>
                            </ul>
                            <button type="submit"
                                class="btn btn-{{ isset($daftar_ulang) ? 'warning' : 'primary' }} mt-3">{{ isset($daftar_ulang) ? 'Update Data' : 'Daftar Ulang' }}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection