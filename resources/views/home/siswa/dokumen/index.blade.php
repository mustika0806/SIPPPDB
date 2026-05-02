@extends('layouts.app', ['title' => 'Dokumen'])
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Halaman Upload Berkas</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($dokumen))
                        @if ($dokumen && $dokumen->status != 'Perbaiki Dokumen')
                            <div class="alert alert-success" role="alert">
                                Data Dokumen berhasil disimpan Dan Sedang Diverifikasi mohon Cek Status
                                Dibawah ini !
                            </div>
                            <table class="table">
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $dokumen->status }}</td>
                                </tr>
                            </table>
                        @else
                            @include('home.siswa.dokumen.form')
                        @endif
                    @else
                        @include('home.siswa.dokumen.form')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
