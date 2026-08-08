<style>
    .required-star {
        color: #dc3545;
        font-weight: 700;
        margin-left: 2px;
    }
</style>
<div class="text-center mb-4">
    <h3 class="font-weight-bold" style="color: #009b4e;">
    </h3>
</div>

<div class="card shadow-sm border-0" style="max-width: 1050px; margin: auto; border-radius: 10px;">
    <div class="card-body p-4">

        <div class="mb-4">
            <h6 class="font-weight-bold" style="border-left: 3px solid #00a65a; padding-left: 10px;">
                Data Sekolah
            </h6>
        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="sekolah_asal">Asal Sekolah<span class="required-star">*</span></label>
                    <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror"
                        name="sekolah_asal" id="sekolah_asal" placeholder="Inputkan asal sekolah"
                        value="{{ isset($siswa) ? $siswa->sekolah_asal : old('sekolah_asal') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nisn">NISN<span class="required-star">*</span></label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn"
                        placeholder="NISN" value="{{ isset($siswa) ? $siswa->nisn : old('nisn') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nilai_ijazah">Nilai Ijazah<span class="required-star">*</span></label>
                    <input type="number" class="form-control @error('nilai_ijazah') is-invalid @enderror"
                        name="nilai_ijazah" id="nilai_ijazah" placeholder="Nilai Ijazah"
                        value="{{ isset($siswa) ? $siswa->nilai_ijazah : old('nilai_ijazah') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nilai_rata">Nilai Ujian Sekolah<span class="required-star">*</span></label>
                    <input type="number" class="form-control @error('nilai_rata') is-invalid @enderror"
                        name="nilai_rata" id="nilai_rata" placeholder="Nilai rata-rata"
                        value="{{ isset($siswa) ? $siswa->nilai_rata : old('nilai_rata') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nilai_tka">Nilai Tes Kemampuan Akademik (TKA)<span
                            class="required-star">*</span></label>
                    <input type="number" class="form-control @error('nilai_tka') is-invalid @enderror" name="nilai_tka"
                        id="nilai_tka" placeholder="Nilai TKA"
                        value="{{ isset($siswa) ? $siswa->nilai_tka : old('nilai_tka') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

        </div>

    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            const siswa = @json($siswa ?? null);
            const urlSimpan = @json(route('siswa.pendaftaran.wali'));
            const urlPendaftaran = @json(route('siswa.pendaftaran.index'));

            /*
             * Jika data siswa belum tersedia,
             * pengguna dikembalikan ke tahap pemilihan jurusan.
             */
            if (!siswa) {
                window.location.href = urlPendaftaran + '?step=kelas';
                return;
            }

            /*
             * Menghapus event sebelumnya agar proses tidak berjalan
             * lebih dari satu kali.
             */
            $(document)
                .off('click.simpanWali', '#btnSimpan')
                .on('click.simpanWali', '#btnSimpan', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const tombolSimpan = $(this);
                    const teksTombolAwal = tombolSimpan.html();

                    const sekolahAsal = $('#sekolah_asal').val().trim();
                    const nisn = $('#nisn').val().trim();
                    const nilaiIjazah = $('#nilai_ijazah').val();
                    const nilaiRata = $('#nilai_rata').val();

                    /*
                     * Menghapus pesan validasi sebelumnya.
                     */
                    $('#formPendaftaran .form-control')
                        .removeClass('is-invalid');

                    $('#formPendaftaran .invalid-feedback')
                        .text('');

                    /*
                     * Validasi sederhana sebelum data dikirim.
                     */
                    if (
                        sekolahAsal === '' ||
                        nisn === '' ||
                        nilaiIjazah === '' ||
                        nilaiRata === ''
                    ) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data Belum Lengkap',
                            text: 'Silakan lengkapi seluruh data sekolah terlebih dahulu.',
                            confirmButtonText: 'Periksa Kembali'
                        });

                        return;
                    }

                    tombolSimpan
                        .prop('disabled', true)
                        .html(`
                                <span
                                    class="spinner-border spinner-border-sm"
                                    role="status"
                                    aria-hidden="true"
                                ></span>
                                Menyimpan...
                            `);

                    Swal.fire({
                        title: 'Menyimpan Data',
                        text: 'Mohon tunggu, data pendaftaran sedang disimpan.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: function () {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: urlSimpan,
                        type: 'POST',
                        dataType: 'json',

                        /*
                         * Mengambil seluruh input yang terdapat
                         * di dalam form, termasuk token CSRF.
                         */
                        data: $('#formPendaftaran').serialize(),

                        success: function (response) {
                            Swal.close();

                            if (response.success === false) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Data Gagal Disimpan',
                                    text: response.message ||
                                        'Data pendaftaran gagal disimpan.',
                                    confirmButtonText: 'Periksa Kembali'
                                });

                                return;
                            }

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message ||
                                    'Data pendaftaran berhasil disimpan.',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(function () {
                                if (response.url) {
                                    window.location.href = response.url;
                                } else if (response.redirect) {
                                    window.location.href =
                                        response.redirect;
                                } else {
                                    window.location.href =
                                        urlPendaftaran;
                                }
                            });
                        },

                        error: function (xhr) {
                            Swal.close();

                            const response = xhr.responseJSON || {};
                            let pesan = response.message ||
                                response.error ||
                                'Data pendaftaran gagal disimpan.';

                            /*
                             * Menghapus status validasi sebelumnya.
                             */
                            $('#formPendaftaran .form-control')
                                .removeClass('is-invalid');

                            $('#formPendaftaran .invalid-feedback')
                                .text('');

                            /*
                             * Menampilkan pesan validasi Laravel
                             * pada setiap kolom.
                             */
                            if (
                                xhr.status === 422 &&
                                response.errors
                            ) {
                                const daftarError = [];

                                $.each(
                                    response.errors,
                                    function (key, value) {
                                        const input = $('#' + key);
                                        const pesanField = Array.isArray(value)
                                            ? value[0]
                                            : value;

                                        daftarError.push(pesanField);

                                        input.addClass('is-invalid');

                                        input
                                            .closest('.form-group')
                                            .find('.invalid-feedback')
                                            .text(pesanField);
                                    }
                                );

                                pesan = `
                                        <div style="text-align: left;">
                                            <p>
                                                Silakan periksa kembali data berikut:
                                            </p>

                                            <ul style="
                                                padding-left: 20px;
                                                margin-bottom: 0;
                                            ">
                                                ${daftarError.map(function (item) {
                                    return `
                                                        <li>
                                                            ${escapeHtml(item)}
                                                        </li>
                                                    `;
                                }).join('')}
                                            </ul>
                                        </div>
                                    `;
                            } else if (xhr.status === 419) {
                                pesan =
                                    'Sesi halaman telah berakhir. Silakan muat ulang halaman dan coba kembali.';
                            } else if (xhr.status >= 500) {
                                pesan =
                                    'Terjadi kesalahan pada sistem saat menyimpan data. Silakan coba kembali.';
                            } else {
                                pesan = escapeHtml(pesan);
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Data Gagal Disimpan',
                                html: pesan,
                                confirmButtonText: 'Periksa Kembali',
                                allowOutsideClick: false
                            });
                        },

                        complete: function () {
                            tombolSimpan
                                .prop('disabled', false)
                                .html(teksTombolAwal);
                        }
                    });
                });

            function escapeHtml(text) {
                const element = document.createElement('div');
                element.textContent = String(text);

                return element.innerHTML;
            }
        });
    </script>
@endpush