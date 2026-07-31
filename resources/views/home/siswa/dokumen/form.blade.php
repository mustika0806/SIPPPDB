<form
    action="{{ route('siswa.dokumen.store') }}"
    method="POST"
    enctype="multipart/form-data"
    id="formUploadDokumen"
>
    @csrf

    <input
        type="hidden"
        name="siswa_id"
        value="{{ $siswa->id }}"
    >

    <input
        type="hidden"
        name="pindahan"
        value="{{ $siswa->pindahan == 'Ya' ? 1 : 0 }}"
    >

    <style>
        .upload-section-title {
            font-weight: 700;
            color: #009b4e;
            border-left: 4px solid #009b4e;
            padding-left: 10px;
            margin-bottom: 20px;
        }

        .upload-card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 15px;
            height: 100%;
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .upload-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .upload-card label {
            display: block;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .preview-img {
            display: block;
            max-height: 140px;
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 3px;
            background: #f8f9fa;
            object-fit: contain;
        }

        .upload-note {
            font-size: 13px;
            margin-top: 25px;
            padding-left: 20px;
        }

        .upload-note li {
            margin-bottom: 5px;
        }

        .form-control {
            font-size: 13px;
        }

        .form-control.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.12) !important;
        }

        .upload-card.has-error {
            border-color: #dc3545;
            background-color: #fffafa;
        }

        .current-document {
            margin-bottom: 10px;
        }

        .current-document-title {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .new-preview-title {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #009b4e;
            margin-bottom: 5px;
        }

        .swal-upload-errors {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 340px;
            overflow-y: auto;
        }

        .swal-upload-error-item {
            padding: 10px 12px;
            margin-bottom: 8px;
            background-color: #fff3f3;
            border-left: 4px solid #dc3545;
            border-radius: 6px;
            color: #721c24;
            font-size: 14px;
            line-height: 1.4;
        }

        .button-loading {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="upload-section-title">
        Upload Dokumen Pendaftaran
    </div>

    <div class="row">

        {{-- =====================================================
            KARTU KELUARGA
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_kk') has-error @enderror">

                <label for="file_kk">
                    Upload Kartu Keluarga
                </label>

                @if (isset($dokumen) && $dokumen->file_kk)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_kk) }}"
                            alt="Kartu Keluarga"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_kk"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_kk"
                        class="preview-img"
                        alt="Pratinjau Kartu Keluarga"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_kk') is-invalid @enderror"
                    name="file_kk"
                    id="file_kk"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_kk')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_kk')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            KTP ORANG TUA
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_ktp') has-error @enderror">

                <label for="file_ktp">
                    Upload KTP Orang Tua
                </label>

                @if (isset($dokumen) && $dokumen->file_ktp)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_ktp) }}"
                            alt="KTP Orang Tua"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_ktp"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_ktp"
                        class="preview-img"
                        alt="Pratinjau KTP Orang Tua"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_ktp') is-invalid @enderror"
                    name="file_ktp"
                    id="file_ktp"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_ktp')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_ktp')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            AKTA KELAHIRAN
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_akta') has-error @enderror">

                <label for="file_akta">
                    Upload Akta Kelahiran
                </label>

                @if (isset($dokumen) && $dokumen->file_akta)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_akta) }}"
                            alt="Akta Kelahiran"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_akta"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_akta"
                        class="preview-img"
                        alt="Pratinjau Akta Kelahiran"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_akta') is-invalid @enderror"
                    name="file_akta"
                    id="file_akta"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_akta')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_akta')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            RAPORT
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_raport') has-error @enderror">

                <label for="file_raport">
                    Upload Raport
                </label>

                @if (isset($dokumen) && $dokumen->file_raport)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_raport) }}"
                            alt="Raport"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_raport"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_raport"
                        class="preview-img"
                        alt="Pratinjau Raport"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_raport') is-invalid @enderror"
                    name="file_raport"
                    id="file_raport"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_raport')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_raport')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            IJAZAH / SKL
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_ijazah') has-error @enderror">

                <label for="file_ijazah">
                    Upload Ijazah SMP/SKL SMP
                </label>

                @if (isset($dokumen) && $dokumen->file_ijazah)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_ijazah) }}"
                            alt="Ijazah atau SKL SMP"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_ijazah"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_ijazah"
                        class="preview-img"
                        alt="Pratinjau Ijazah"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_ijazah') is-invalid @enderror"
                    name="file_ijazah"
                    id="file_ijazah"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_ijazah')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_ijazah')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            KKS / KIP
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_kip') has-error @enderror">

                <label for="file_kip">
                    Upload KKS/KIP/dll
                </label>

                @if (isset($dokumen) && $dokumen->file_kip)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_kip) }}"
                            alt="KKS atau KIP"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_kip"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_kip"
                        class="preview-img"
                        alt="Pratinjau KKS atau KIP"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_kip') is-invalid @enderror"
                    name="file_kip"
                    id="file_kip"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_kip')"
                >

                <small class="text-muted">
                    Opsional, diisi apabila memiliki KKS/KIP.
                </small>

                @error('file_kip')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            SURAT PINDAHAN
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_keputusan') has-error @enderror">

                <label for="file_keputusan">
                    Upload Surat Pindahan
                </label>

                @if (isset($dokumen) && $dokumen->file_keputusan)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_keputusan) }}"
                            alt="Surat Pindahan"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_keputusan"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_keputusan"
                        class="preview-img"
                        alt="Pratinjau Surat Pindahan"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_keputusan') is-invalid @enderror"
                    name="file_keputusan"
                    id="file_keputusan"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_keputusan')"
                >

                <small class="text-muted">
                    Khusus siswa pindahan. Kosongkan apabila bukan siswa pindahan.
                </small>

                @error('file_keputusan')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        {{-- =====================================================
            PAS FOTO
        ====================================================== --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card @error('file_foto') has-error @enderror">

                <label for="file_foto">
                    Upload Pas Foto
                </label>

                @if (isset($dokumen) && $dokumen->file_foto)
                    <div class="current-document">
                        <span class="current-document-title">
                            Dokumen saat ini:
                        </span>

                        <img
                            src="{{ url($dokumen->file_foto) }}"
                            alt="Pas Foto"
                            class="preview-img"
                        >
                    </div>
                @endif

                <div
                    id="container_preview_file_foto"
                    style="display: none;"
                >
                    <span class="new-preview-title">
                        Dokumen baru:
                    </span>

                    <img
                        id="preview_file_foto"
                        class="preview-img"
                        alt="Pratinjau Pas Foto"
                    >
                </div>

                <input
                    type="file"
                    class="form-control @error('file_foto') is-invalid @enderror"
                    name="file_foto"
                    id="file_foto"
                    accept=".jpeg,.jpg,.png,image/jpeg,image/png"
                    onchange="previewFile(this, 'preview_file_foto')"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, atau PNG.
                </small>

                @error('file_foto')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

    </div>

    <ul class="upload-note text-danger">
        <li>Pastikan dokumen yang diunggah benar dan dapat dibaca dengan jelas.</li>
        <li>Format dokumen yang diperbolehkan adalah JPG, JPEG, dan PNG.</li>
        <li>KKS/KIP bersifat opsional dan hanya diunggah apabila tersedia.</li>
        <li>Surat pindahan hanya diunggah oleh siswa pindahan.</li>
        <li>
            Setelah disimpan, perubahan dokumen harus mendapatkan konfirmasi
            dari admin.
        </li>
    </ul>

    <button
        type="submit"
        class="btn btn-{{ isset($dokumen) ? 'warning' : 'primary' }} mt-3"
        id="buttonSimpanDokumen"
    >
        <span class="button-normal">
            <i class="fas fa-save"></i>
            {{ isset($dokumen) ? 'Update Data' : 'Simpan' }}
        </span>

        <span class="button-loading d-none">
            <span
                class="spinner-border spinner-border-sm mr-1"
                role="status"
                aria-hidden="true"
            ></span>

            Menyimpan...
        </span>
    </button>

</form>

@push('js')

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        /*
        |--------------------------------------------------------------------------
        | Pratinjau dokumen
        |--------------------------------------------------------------------------
        */
        function previewFile(input, previewId) {
            const preview = document.getElementById(previewId);
            const container = document.getElementById(
                'container_' + previewId
            );

            if (!preview || !container) {
                return;
            }

            const file = input.files && input.files[0]
                ? input.files[0]
                : null;

            if (!file) {
                preview.removeAttribute('src');
                container.style.display = 'none';
                return;
            }

            const allowedExtensions = [
                'jpg',
                'jpeg',
                'png'
            ];

            const fileName = file.name || '';
            const extension = fileName
                .split('.')
                .pop()
                .toLowerCase();

            if (!allowedExtensions.includes(extension)) {
                input.value = '';

                preview.removeAttribute('src');
                container.style.display = 'none';

                input.classList.add('is-invalid');

                const card = input.closest('.upload-card');

                if (card) {
                    card.classList.add('has-error');
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Format Dokumen Tidak Sesuai',
                    text: 'Dokumen harus menggunakan format JPG, JPEG, atau PNG.',
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#009b4e'
                });

                return;
            }

            input.classList.remove('is-invalid');

            const card = input.closest('.upload-card');

            if (card) {
                card.classList.remove('has-error');
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                preview.src = event.target.result;
                container.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById(
                'formUploadDokumen'
            );

            const submitButton = document.getElementById(
                'buttonSimpanDokumen'
            );

            if (!form || !submitButton) {
                return;
            }

            const fieldLabels = {
                siswa_id: 'Data siswa',
                pindahan: 'Status siswa pindahan',
                file_kk: 'Kartu Keluarga',
                file_ktp: 'KTP Orang Tua',
                file_akta: 'Akta Kelahiran',
                file_raport: 'Raport',
                file_ijazah: 'Ijazah SMP/SKL SMP',
                file_kip: 'KKS/KIP',
                file_keputusan: 'Surat Pindahan',
                file_foto: 'Pas Foto'
            };

            function getFieldLabel(field) {
                if (fieldLabels[field]) {
                    return fieldLabels[field];
                }

                return field
                    .replace(/\./g, ' ')
                    .replace(/_/g, ' ')
                    .replace(/\b\w/g, function (character) {
                        return character.toUpperCase();
                    });
            }

            function translateErrorMessage(message, field) {
                const label = getFieldLabel(field);

                if (!message) {
                    return label + ' belum valid.';
                }

                if (/field is required/i.test(message)) {
                    return label + ' wajib diunggah.';
                }

                if (
                    /must be an image/i.test(message) ||
                    /must be a file of type/i.test(message) ||
                    /must be a file of type:/i.test(message) ||
                    /mimes/i.test(message)
                ) {
                    return label +
                        ' harus menggunakan format JPG, JPEG, atau PNG.';
                }

                if (/failed to upload/i.test(message)) {
                    return label +
                        ' gagal diunggah. Silakan pilih dokumen kembali.';
                }

                if (/may not be greater than/i.test(message)) {
                    return label +
                        ' melebihi ukuran maksimal yang diperbolehkan.';
                }

                if (/must not be greater than/i.test(message)) {
                    return label +
                        ' melebihi ukuran maksimal yang diperbolehkan.';
                }

                if (/must be a file/i.test(message)) {
                    return label + ' harus berupa dokumen yang valid.';
                }

                return message
                    .replace(
                        /The .* field/gi,
                        label
                    );
            }

            function escapeHtml(value) {
                const element = document.createElement('div');
                element.textContent = value;
                return element.innerHTML;
            }

            function markInvalidFields(errors) {
                let firstInvalidField = null;

                Object.keys(errors).forEach(function (field) {
                    const cleanField = field.replace(/\./g, '_');
                    const input = document.getElementById(cleanField);

                    if (!input) {
                        return;
                    }

                    input.classList.add('is-invalid');

                    const card = input.closest('.upload-card');

                    if (card) {
                        card.classList.add('has-error');
                    }

                    if (!firstInvalidField) {
                        firstInvalidField = input;
                    }
                });

                return firstInvalidField;
            }

            function setButtonLoading(isLoading) {
                submitButton.disabled = isLoading;

                const normalContent = submitButton.querySelector(
                    '.button-normal'
                );

                const loadingContent = submitButton.querySelector(
                    '.button-loading'
                );

                if (isLoading) {
                    normalContent.classList.add('d-none');
                    loadingContent.classList.remove('d-none');
                } else {
                    normalContent.classList.remove('d-none');
                    loadingContent.classList.add('d-none');
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Hapus tanda merah ketika pengguna memilih dokumen baru
            |--------------------------------------------------------------------------
            */
            const fileInputs = form.querySelectorAll(
                'input[type="file"]'
            );

            fileInputs.forEach(function (input) {
                input.addEventListener('change', function () {
                    if (input.files.length > 0) {
                        input.classList.remove('is-invalid');

                        const card = input.closest('.upload-card');

                        if (card) {
                            card.classList.remove('has-error');
                        }
                    }
                });
            });

            /*
            |--------------------------------------------------------------------------
            | Pemeriksaan format sebelum form dikirim
            |--------------------------------------------------------------------------
            */
            form.addEventListener('submit', function (event) {
                const allowedExtensions = [
                    'jpg',
                    'jpeg',
                    'png'
                ];

                const clientErrors = [];
                let firstInvalidField = null;

                fileInputs.forEach(function (input) {
                    if (
                        !input.files ||
                        input.files.length === 0
                    ) {
                        return;
                    }

                    const file = input.files[0];
                    const extension = file.name
                        .split('.')
                        .pop()
                        .toLowerCase();

                    if (!allowedExtensions.includes(extension)) {
                        const label = getFieldLabel(input.name);

                        clientErrors.push(
                            label +
                            ' harus menggunakan format JPG, JPEG, atau PNG.'
                        );

                        input.classList.add('is-invalid');

                        const card = input.closest('.upload-card');

                        if (card) {
                            card.classList.add('has-error');
                        }

                        if (!firstInvalidField) {
                            firstInvalidField = input;
                        }
                    }
                });

                if (clientErrors.length > 0) {
                    event.preventDefault();

                    let errorItems = '';

                    clientErrors.forEach(function (message) {
                        errorItems += `
                            <li class="swal-upload-error-item">
                                ${escapeHtml(message)}
                            </li>
                        `;
                    });

                    Swal.fire({
                        icon: 'error',
                        title: 'Dokumen Belum Sesuai',
                        html: `
                            <div style="text-align: left;">
                                <p style="
                                    color: #555;
                                    margin-bottom: 12px;
                                    line-height: 1.5;
                                ">
                                    Silakan periksa kembali dokumen berikut:
                                </p>

                                <ul class="swal-upload-errors">
                                    ${errorItems}
                                </ul>
                            </div>
                        `,
                        confirmButtonText: 'Periksa Dokumen',
                        confirmButtonColor: '#009b4e',
                        width: 650,
                        allowOutsideClick: false
                    }).then(function () {
                        if (firstInvalidField) {
                            firstInvalidField.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                            firstInvalidField.focus();
                        }
                    });

                    return;
                }

                setButtonLoading(true);
            });

            /*
            |--------------------------------------------------------------------------
            | Menampilkan seluruh error validasi Laravel
            |--------------------------------------------------------------------------
            */
            @if ($errors->any())
                const validationErrors = @json($errors->toArray());

                const firstInvalidField = markInvalidFields(
                    validationErrors
                );

                let errorItems = '';
                let totalErrors = 0;

                Object.keys(validationErrors).forEach(function (field) {
                    const messages = validationErrors[field] || [];

                    messages.forEach(function (message) {
                        totalErrors++;

                        const translatedMessage =
                            translateErrorMessage(message, field);

                        errorItems += `
                            <li class="swal-upload-error-item">
                                ${escapeHtml(translatedMessage)}
                            </li>
                        `;
                    });
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Dokumen Belum Lengkap',
                    html: `
                        <div style="text-align: left;">
                            <p style="
                                color: #555;
                                margin-bottom: 12px;
                                line-height: 1.5;
                            ">
                                Terdapat
                                <strong>${totalErrors} kesalahan</strong>.
                                Silakan lengkapi atau perbaiki dokumen
                                berikut:
                            </p>

                            <ul class="swal-upload-errors">
                                ${errorItems}
                            </ul>
                        </div>
                    `,
                    confirmButtonText: 'Periksa Dokumen',
                    confirmButtonColor: '#009b4e',
                    width: 650,
                    allowOutsideClick: false
                }).then(function () {
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        firstInvalidField.focus();
                    }
                });
            @endif

            /*
            |--------------------------------------------------------------------------
            | Pesan berhasil dari session Laravel
            |--------------------------------------------------------------------------
            */
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Dokumen Berhasil Disimpan',
                    text: @json(session('success')),
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#009b4e',
                    allowOutsideClick: false
                });
            @endif

            /*
            |--------------------------------------------------------------------------
            | Pesan error umum dari session
            |--------------------------------------------------------------------------
            */
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Menyimpan Dokumen',
                    text: @json(session('error')),
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#dc3545'
                });
            @endif
        });
    </script>

@endpush