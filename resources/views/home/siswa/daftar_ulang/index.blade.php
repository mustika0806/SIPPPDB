@extends('layouts.app', ['title' => 'Pembayaran'])

@section('content')
    @php
        use Illuminate\Support\Str;

        $sudahSubmit = isset($daftar_ulang) && !empty($daftar_ulang->bukti_transfer);
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

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- JIKA SUDAH UPLOAD BUKTI PEMBAYARAN --}}
                    @if ($sudahSubmit)

                        @if ($daftar_ulang->status == 'Belum Bayar')
                            <div class="alert alert-warning">
                                Bukti pembayaran sudah dikirim dan sedang menunggu verifikasi admin.
                            </div>
                        @elseif ($daftar_ulang->status == 'Sudah Bayar')
                            <div class="alert alert-success">
                                Pembayaran sudah diverifikasi oleh admin.
                            </div>
                        @else
                            <div class="alert alert-info">
                                Status pembayaran: {{ $daftar_ulang->status }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <td width="220">Nama Siswa</td>
                                <td>{{ $daftar_ulang->user->name ?? Auth::user()->name }}</td>
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
                                    @if ($daftar_ulang->status == 'Sudah Bayar')
                                        <span class="badge badge-success">
                                            Sudah Bayar
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            Menunggu Verifikasi
                                        </span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Bukti Transfer</td>
                                <td>
                                    <img src="{{ asset('storage/' . $daftar_ulang->bukti_transfer) }}"
                                        width="300"
                                        class="img-thumbnail"
                                        alt="Bukti Transfer">
                                </td>
                            </tr>
                        </table>

                    {{-- JIKA BELUM UPLOAD BUKTI PEMBAYARAN --}}
                    @else

                        <div class="alert alert-info">
                            Silakan upload bukti transfer pembayaran pendaftaran sebesar
                            <strong>Rp150.000</strong>.
                        </div>

                        <form action="{{ route('siswa.daftar_ulang.store', Auth::user()->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="status" value="Belum Bayar">
                            <input type="hidden" name="persetujuan" value="menunggu">

                            <div class="form-group">
                                <label>Kode Transaksi</label>
                                <input type="text"
                                    class="form-control"
                                    name="code_transaksi"
                                    value="{{ Str::upper(Str::random(16)) }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text"
                                    class="form-control"
                                    name="nominal"
                                    value="150000"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>Upload Bukti Transfer</label>
                                <input type="file"
                                    name="bukti_transfer"
                                    class="form-control @error('bukti_transfer') is-invalid @enderror"
                                    accept="image/*"
                                    required>

                                @error('bukti_transfer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <small class="text-muted">
                                    Format file: JPG, JPEG, atau PNG. Maksimal 2MB.
                                </small>
                            </div>

                            <ul class="mt-3 text-danger">
                                <li>Pastikan bukti transfer yang diunggah sudah benar.</li>
                                <li>Setelah bukti pembayaran dikirim, data akan menunggu verifikasi admin.</li>
                                <li>Status pembayaran hanya dapat diubah oleh admin.</li>
                            </ul>

                            <button type="submit" class="btn btn-primary mt-3">
                                Lanjut
                            </button>

                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection