<form action="{{ route('siswa.dokumen.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
    <input type="hidden" name="pindahan" value="{{ $siswa->pindahan == 'Ya' ? true : false }}">
    <div class="row">
        <div class="col">
            @if (isset($dokumen->file_kk))
                <div class="row mb-2">
                    <div class="col">
                        <img src="{{ url($dokumen->file_kk) }}" width="100" class="img-fluid">
                    </div>
                </div>
            @endif

            <!-- Elemen untuk Preview Gambar Baru -->
            <div class="row mb-2">
                <div class="col">
                    <img id="img-preview" class="img-fluid" style="max-height: 150px; display: none;">
                </div>
            </div>

            <label for="file_kk">Upload KK</label>
            <!-- Tambahkan onchange="previewImage()" -->
            <input type="file" class="form-control @error('file_kk') is-invalid @enderror" name="file_kk"
                id="file_kk" accept=".jpeg, .jpg, .png" onchange="previewImage()">

            @error('file_kk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            @if (isset($dokumen->file_akta))
                <div class="row">
                    <div class="col">
                        <img src="{{ url($dokumen->file_akta) }}" width="100" class="img-fluid">
                    </div>
                </div>
            @endif
            <!-- Elemen untuk Preview Gambar Baru -->
            <div class="row mb-2">
                <div class="col">
                    <img id="img-preview" class="img-fluid" style="max-height: 150px; display: none;">
                </div>
            </div>
            <label for="file_akta">Upload Akta</label>
            <input type="file" class="form-control @error('file_akta') is-invalid @enderror" name="file_akta"
                id="file_akta" accept=".jpeg, .jpg, .png" onchange="previewImage()">

            @error('file_akta')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            @if (isset($dokumen->file_raport))
                <div class="row">
                    <div class="col">
                        <img src="{{ url($dokumen->file_raport) }}" width="100" class="img-fluid">
                    </div>
                </div>
            @endif
            <label for="file_raport">Upload Raport</label>
            <input type="file" class="form-control @error('file_raport') is-invalid @enderror" name="file_raport"
                id="file_raport" accept=".jpeg, .jpg, .png">
            @error('file_raport')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            @if (isset($dokumen->file_foto))
                <div class="row">
                    <div class="col">
                        <img src="{{ url($dokumen->file_foto) }}" alt="pas foto" width="100" class="img-fluid" />
                    </div>
                </div>
            @endif
            <label for="file_foto">Pas Foto</label>
            <input type="file" class="form-control @error('file_foto') is-invalid @enderror" name="file_foto"
                id="file_foto" accept=".jpeg, .jpg, .png">
            @error('file_foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($siswa)
    @endisset
    <ul class="mt-3 text-danger">
        <li>Mohon inputkan data yang valid</li>
        <li>Upload Dokumen Berkas Dengan Format jpg,jpeg dan png</li>
        <li>Ketika tombol simpan ditekan maka data tidak dapat dirubah. Kecuali dikonfirmasi untuk
            dirubah oleh admin</li>
    </ul>
    <button type="submit"
        class="btn btn-{{ isset($dokumen) ? 'warning' : 'primary' }} mt-3">{{ isset($dokumen) ? 'Update Data' : 'Simpan' }}</button>
</form>
