@extends('layouts.app', ['title' => 'Pendaftaran'])
@section('content')
    <style>
        .required-star {
            color: #dc3545;
            font-weight: 700;
            margin-left: 2px;
        }
    </style>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">
                                @php
                                    $step = request()->get('step');
                                @endphp
                                @isset($siswa)
                                    Halaman Pendaftaran
                                @else
                                    {{ $step == 'wali' ? 'Data Wali' : ($step == 'wali' ? 'Data Wali' : ($step == 'biodata' ? 'Biodata' : 'Pilih Jurusan')) }}
                                @endisset
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($siswa))
                        @if ($siswa->is_save == true && $siswa->status != 'Perbaiki Data')
                            <div class="alert alert-success" role="alert">
                                Data Pendaftaran berhasil disimpan Dan Sedang Diverifikasi mohon Cek Status Pendaftaran
                                Dibawah ini !
                            </div>
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $siswa->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>{{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan yang dipilih</td>
                                    <td>{{ $siswa->kelas->nama_jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>Nilai Rata</td>
                                    <td>{{ $siswa->nilai_rata }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pendaftaran</td>
                                    <td>{{ $siswa->status }}</td>
                                </tr>
                            </table>
                        @else
                            @include('home.siswa.pendaftaran.form')
                        @endif
                    @else
                        @include('home.siswa.pendaftaran.form')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            const storeUrl = @json(route('siswa.pendaftaran.store'));
            const indexUrl = @json(route('siswa.pendaftaran.index'));
            const currentUrl = @json(url()->current());
            const csrfToken = @json(csrf_token());
            const userId = @json(Auth::id());
            const currentStep = @json(request()->get('step'));

            function escapeHtml(text) {
                const element = document.createElement('div');
                element.textContent = String(text);

                return element.innerHTML;
            }

            function tampilkanError(xhr) {
                let response = null;
                let pesan = 'Terjadi kesalahan saat memproses pendaftaran.';
                let judul = 'Pendaftaran Gagal';

                if (xhr.responseJSON) {
                    response = xhr.responseJSON;
                } else if (xhr.responseText) {
                    try {
                        response = JSON.parse(xhr.responseText);
                    } catch (error) {
                        response = null;
                    }
                }

                if (response) {
                    pesan = response.message ||
                        response.error ||
                        pesan;
                }

                if (
                    xhr.status === 422 &&
                    response &&
                    response.errors
                ) {
                    const daftarError = Object.values(
                        response.errors
                    ).flat();

                    pesan = `
                            <div style="text-align: left;">
                                <p>Silakan periksa kembali data berikut:</p>

                                <ul style="padding-left: 20px;">
                                    ${daftarError.map(function (error) {
                        return `
                                            <li>${escapeHtml(error)}</li>
                                        `;
                    }).join('')}
                                </ul>
                            </div>
                        `;
                } else {
                    pesan = escapeHtml(pesan);
                }

                if (xhr.status === 400) {
                    judul = 'Pendaftaran Tidak Dapat Diproses';
                } else if (xhr.status === 419) {
                    judul = 'Sesi Telah Berakhir';
                    pesan =
                        'Sesi halaman telah berakhir. Silakan muat ulang halaman.';
                } else if (xhr.status === 422) {
                    judul = 'Data Belum Lengkap';
                } else if (xhr.status >= 500) {
                    judul = 'Terjadi Kesalahan Sistem';
                    pesan =
                        'Sistem mengalami kesalahan. Silakan coba kembali.';
                }

                Swal.fire({
                    icon: 'error',
                    title: judul,
                    html: pesan,
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                });
            }

            /*
             * Script pilihan jurusan hanya dijalankan pada tahap kelas.
             * Tidak akan dijalankan pada tahap biodata atau wali.
             */
            if (
                currentStep === null ||
                currentStep === '' ||
                currentStep === 'kelas'
            ) {
                $('#next')
                    .off('click.pilihJurusan')
                    .on('click.pilihJurusan', function (event) {
                        event.preventDefault();

                        const kelasId = $('#kelas_id').val();
                        const tombolLanjut = $(this);
                        const teksTombolAwal = tombolLanjut.html();

                        if (!kelasId) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Jurusan Belum Dipilih',
                                text: 'Silakan pilih jurusan terlebih dahulu.',
                                confirmButtonText: 'OK'
                            });

                            return;
                        }

                        tombolLanjut
                            .addClass('disabled')
                            .attr('aria-disabled', 'true')
                            .html(`
                                    <span class="
                                        spinner-border
                                        spinner-border-sm
                                    "></span>
                                    Memproses...
                                `);

                        Swal.fire({
                            title: 'Memproses Data',
                            text: 'Pilihan jurusan sedang disimpan.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            didOpen: function () {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: storeUrl,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                step: 'biodata',
                                _token: csrfToken,
                                user_id: userId,
                                kelas_id: kelasId
                            },

                            success: function (response) {
                                Swal.close();

                                if (response.success === false) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Pendaftaran Gagal',
                                        text: response.message ||
                                            'Data gagal diproses.',
                                        confirmButtonText: 'OK'
                                    });

                                    return;
                                }

                                window.location.href =
                                    indexUrl + '?step=biodata';
                            },

                            error: function (xhr) {
                                Swal.close();
                                tampilkanError(xhr);
                            },

                            complete: function () {
                                tombolLanjut
                                    .removeClass('disabled')
                                    .removeAttr('aria-disabled')
                                    .html(teksTombolAwal);
                            }
                        });
                    });
            }

            /*
             * Tombol kembali.
             */
            $('#previous')
                .off('click.previousStep')
                .on('click.previousStep', function (event) {
                    event.preventDefault();

                    let back = '';

                    if (currentStep === 'biodata') {
                        back = 'kelas';
                    } else if (currentStep === 'wali') {
                        back = 'biodata';
                    } else if (currentStep === 'sekolah') {
                        back = 'wali';
                    }

                    if (back !== '') {
                        window.location.href =
                            currentUrl +
                            '?step=' +
                            encodeURIComponent(back);
                    }
                });
        });
    </script>
@endpush