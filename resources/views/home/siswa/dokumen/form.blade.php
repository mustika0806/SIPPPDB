<form action="{{ route('siswa.dokumen.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
    <input type="hidden" name="pindahan" value="{{ $siswa->pindahan == 'Ya' ? 1 : 0 }}">

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
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .upload-card label {
            font-weight: 600;
            color: #374151;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .preview-img {
            max-height: 120px;
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            padding: 3px;
            background: #f8f9fa;
        }

        .upload-note {
            font-size: 13px;
            margin-top: 25px;
        }

        .form-control {
            font-size: 13px;
        }
    </style>

    <div class="upload-section-title">
        Upload Dokumen Pendaftaran
    </div>

    <div class="row">

        {{-- Upload KK --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_kk">Upload Kartu Keluarga</label>

                @if (isset($dokumen) && $dokumen->file_kk)
                    <div>
                        <img src="{{ url($dokumen->file_kk) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_kk" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_kk') is-invalid @enderror"
                       name="file_kk"
                       id="file_kk"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_kk')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_kk')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload KTP Orang Tua --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_ktp">Upload KTP Orang Tua</label>

                @if (isset($dokumen) && $dokumen->file_ktp)
                    <div>
                        <img src="{{ url($dokumen->file_ktp) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_ktp" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_ktp') is-invalid @enderror"
                       name="file_ktp"
                       id="file_ktp"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_ktp')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_ktp')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload Akta --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_akta">Upload Akta Kelahiran</label>

                @if (isset($dokumen) && $dokumen->file_akta)
                    <div>
                        <img src="{{ url($dokumen->file_akta) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_akta" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_akta') is-invalid @enderror"
                       name="file_akta"
                       id="file_akta"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_akta')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_akta')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload Raport --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_raport">Upload Raport</label>

                @if (isset($dokumen) && $dokumen->file_raport)
                    <div>
                        <img src="{{ url($dokumen->file_raport) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_raport" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_raport') is-invalid @enderror"
                       name="file_raport"
                       id="file_raport"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_raport')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_raport')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload Ijazah --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_ijazah">Upload Ijazah SMP/SKL SMP</label>

                @if (isset($dokumen) && $dokumen->file_ijazah)
                    <div>
                        <img src="{{ url($dokumen->file_ijazah) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_ijazah" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_ijazah') is-invalid @enderror"
                       name="file_ijazah"
                       id="file_ijazah"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_ijazah')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_ijazah')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload KKS / KIP --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_kip">Upload KKS/KIP/dll</label>

                @if (isset($dokumen) && $dokumen->file_kip)
                    <div>
                        <img src="{{ url($dokumen->file_kip) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_kip" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_kip') is-invalid @enderror"
                       name="file_kip"
                       id="file_kip"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_kip')">

                <small class="text-muted">Opsional jika memiliki</small>

                @error('file_kip')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload Surat Pindahan --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_keputusan">Upload Surat Pindahan</label>

                @if (isset($dokumen) && $dokumen->file_keputusan)
                    <div>
                        <img src="{{ url($dokumen->file_keputusan) }}" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_keputusan" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_keputusan') is-invalid @enderror"
                       name="file_keputusan"
                       id="file_keputusan"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_keputusan')">

                <small class="text-muted">
                    Khusus siswa pindahan. Kosongkan jika bukan siswa pindahan.
                </small>

                @error('file_keputusan')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Upload Pas Foto --}}
        <div class="col-md-4 mb-4">
            <div class="upload-card">
                <label for="file_foto">Upload Pas Foto</label>

                @if (isset($dokumen) && $dokumen->file_foto)
                    <div>
                        <img src="{{ url($dokumen->file_foto) }}" alt="pas foto" class="preview-img">
                    </div>
                @endif

                <img id="preview_file_foto" class="preview-img" style="display: none;">

                <input type="file"
                       class="form-control @error('file_foto') is-invalid @enderror"
                       name="file_foto"
                       id="file_foto"
                       accept=".jpeg,.jpg,.png"
                       onchange="previewFile(this, 'preview_file_foto')">

                <small class="text-muted">Format: jpg, jpeg, png</small>

                @error('file_foto')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

    </div>

    <ul class="upload-note text-danger">
        <li>Mohon inputkan data yang valid.</li>
        <li>Upload dokumen berkas dengan format jpg, jpeg, dan png.</li>
        <li>Surat pindahan hanya diisi oleh siswa pindahan.</li>
        <li>Ketika tombol simpan ditekan, data tidak dapat diubah kecuali dikonfirmasi untuk diubah oleh admin.</li>
    </ul>

    <button type="submit" class="btn btn-{{ isset($dokumen) ? 'warning' : 'primary' }} mt-3">
        <i class="fas fa-save"></i>
        {{ isset($dokumen) ? 'Update Data' : 'Simpan' }}
    </button>
</form>

@push('js')
<script>
    function previewFile(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endpush