<form
    id="formPendaftaran"
    action="{{ route('siswa.pendaftaran.store') }}"
    method="POST"
>
    @csrf

    @if (request()->get('step') == '' || request()->get('step') == 'kelas')
        <div class="col">
            <label for="kelas_id">Jurusan</label>

            <select
                class="form-control @error('kelas_id') is-invalid @enderror"
                name="kelas_id"
                id="kelas_id"
            >
                <option value="">-- Pilih Jurusan --</option>

                @foreach ($kelas as $item)
                    <option
                        value="{{ $item->id }}"
                        {{ isset($siswa)
                            ? ($siswa->kelas_id == $item->id ? 'selected' : '')
                            : (old('kelas_id') == $item->id ? 'selected' : '') }}
                    >
                        {{ $item->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            @error('kelas_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    @elseif (request()->get('step') == 'biodata')
        @include('home.siswa.pendaftaran.biodata')

    @elseif (request()->get('step') == 'wali')
        @include('home.siswa.pendaftaran.wali')
    @endif

    <ul class="mt-3 text-danger">
        <li>Mohon masukkan data yang valid.</li>
        <li>
            Setelah tombol simpan ditekan, data tidak dapat diubah kembali,
            kecuali telah dikonfirmasi untuk diubah oleh admin.
        </li>
    </ul>

    @if ($step != null && $step != 'kelas')
        <a
            href="javascript:void(0)"
            id="previous"
            class="btn btn-warning mt-3 mx-2"
        >
            Sebelumnya
        </a>
    @endif

    @if ($step == 'wali')
        <button
            type="button"
            id="btnSimpan"
            class="btn btn-primary mt-3"
        >
            Simpan
        </button>
    @else
        <a
            href="javascript:void(0)"
            id="next"
            class="btn btn-primary mt-3"
        >
            Lanjut
        </a>
    @endif
</form>

<script>
    /**
     * Memuat SweetAlert langsung dari halaman ini.
     * Apabila SweetAlert sudah tersedia, tidak akan dimuat kembali.
     */
    function muatSweetAlert() {
        return new Promise(function (resolve, reject) {
            if (typeof window.Swal !== 'undefined') {
                resolve();
                return;
            }

            const scriptLama = document.getElementById('sweetalert-script');

            if (scriptLama) {
                scriptLama.addEventListener('load', resolve);
                scriptLama.addEventListener('error', reject);
                return;
            }

            const script = document.createElement('script');

            script.id = 'sweetalert-script';
            script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
            script.onload = resolve;
            script.onerror = reject;

            document.head.appendChild(script);
        });
    }

    async function simpanPendaftaran(event) {
        event.preventDefault();
        event.stopPropagation();

        const form = document.getElementById('formPendaftaran');
        const tombolSimpan = document.getElementById('btnSimpan');

        if (!form || !tombolSimpan) {
            return false;
        }

        try {
            await muatSweetAlert();
        } catch (error) {
            alert(
                'SweetAlert gagal dimuat. Periksa koneksi internet, kemudian coba kembali.'
            );

            return false;
        }

        const teksTombolAwal = tombolSimpan.innerHTML;

        tombolSimpan.disabled = true;
        tombolSimpan.innerHTML = `
            <span
                class="spinner-border spinner-border-sm"
                role="status"
                aria-hidden="true"
            ></span>
            Menyimpan...
        `;

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

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const responseText = await response.text();

            let data = {};

            try {
                data = responseText ? JSON.parse(responseText) : {};
            } catch (error) {
                data = {
                    success: false,
                    message: 'Respons dari sistem tidak dapat dibaca.'
                };
            }

            if (!response.ok || data.success === false) {
                let pesan = data.message ||
                    data.error ||
                    'Data pendaftaran gagal disimpan.';

                if (response.status === 422 && data.errors) {
                    const daftarError = Object.values(data.errors).flat();

                    pesan = `
                        <div style="text-align: left;">
                            <p>Silakan periksa kembali data berikut:</p>

                            <ul style="padding-left: 20px;">
                                ${daftarError.map(function (item) {
                                    return `<li>${escapeHtml(item)}</li>`;
                                }).join('')}
                            </ul>
                        </div>
                    `;
                } else if (response.status === 419) {
                    pesan =
                        'Sesi halaman telah berakhir. Silakan muat ulang halaman dan coba kembali.';
                } else {
                    pesan = escapeHtml(pesan);
                }

                await Swal.fire({
                    icon: 'error',
                    title: 'Data Gagal Disimpan',
                    html: pesan,
                    confirmButtonText: 'Periksa Kembali',
                    allowOutsideClick: false
                });

                return false;
            }

            await Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: data.message ||
                    'Data pendaftaran berhasil disimpan.',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            });

            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                window.location.reload();
            }

        } catch (error) {
            await Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Sistem tidak dapat memproses data. Silakan coba kembali.',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            });
        } finally {
            tombolSimpan.disabled = false;
            tombolSimpan.innerHTML = teksTombolAwal;
        }

        return false;
    }

    function escapeHtml(text) {
        const element = document.createElement('div');

        element.textContent = String(text);

        return element.innerHTML;
    }
</script>

