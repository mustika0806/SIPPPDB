<div class="col">
</div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="anak_ke">Anak Ke-</label>
        <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke" id="anak_ke"
            placeholder="Anak Ke-" value="{{ isset($item) ? $item->anak_ke : old('anak_ke') }}" disabled>
    </div>
    <div class="col">
        <label for="nilai_rata">Nilai Rata</label>
        <input type="number" class="form-control @error('nilai_rata') is-invalid @enderror" name="nilai_rata"
            id="nilai_rata" placeholder="Nilai Rata" value="{{ isset($item) ? $item->nilai_rata : old('nilai_rata') }}"
            disabled>
    </div>
    <div class="col">
        <label for="dusun">Dusun</label>
        <input type="text" class="form-control @error('dusun') is-invalid @enderror" name="dusun" id="dusun"
            placeholder="Dusun" value="{{ isset($item) ? $item->dusun : old('dusun') }}" disabled>
    </div>
    <div class="col">
        <label for="lintang">Lintang</label>
        <input type="text" class="form-control @error('lintang') is-invalid @enderror" name="lintang" id="lintang"
            placeholder="lintang" value="{{ isset($item) ? $item->lintang : old('lintang') }}" disabled>
    </div>
    <div class="col">
        <label for="bujur">Bujur</label>
        <input type="text" class="form-control @error('bujur') is-invalid @enderror" name="bujur" id="bujur"
            placeholder="Bujur" value="{{ isset($item) ? $item->bujur : old('bujur') }}" disabled>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah"
            placeholder="Nama Ayah" value="{{ isset($item) ? $item->nama_ayah : old('nama_ayah') }}" disabled>
    </div>
    <div class="col">
        <label for="nama_ibu">Nama Ibu</label>
        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu"
            placeholder="Nama Ibu" value="{{ isset($item) ? $item->nama_ibu : old('nama_ibu') }}" disabled>
    </div>
    <div class="col">
        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
        <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah"
            id="pekerjaan_ayah" placeholder="Pekerjaan Ayah"
            value="{{ isset($item) ? $item->pekerjaan_ayah : old('pekerjaan_ayah') }}" disabled>
    </div>
    <div class="col">
        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
        <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu"
            id="pekerjaan_ibu" placeholder="Pekerjaan Ibu"
            value="{{ isset($item) ? $item->pekerjaan_ibu : old('pekerjaan_ibu') }}" disabled>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="transportasi">Transportasi</label>
        <select class="form-control @error('transportasi') is-invalid @enderror" name="transportasi" id="transportasi"
            disabled>
            <option value="Jalan Kaki" {{ isset($item) ? ($item->transportasi == 'Jalan Kaki' ? 'selected' : '') : (old('transportasi') == 'Jalan Kaki' ? 'selected' : '') }}>
                Jalan Kaki</option>
            <option value="Kendaraan Pribadi" {{ isset($item) ? ($item->transportasi == 'Kendaraan Pribadi' ? 'selected' : '') : (old('transportasi') == 'Kendaraan Pribadi' ? 'selected' : '') }}>
                Kendaraan Pribadi</option>
            <option value="Angkutan Umum" {{ isset($item) ? ($item->transportasi == 'Angkutan Umum' ? 'selected' : '') : (old('transportasi') == 'Angkutan Umum' ? 'selected' : '') }}>
                Angkutan Umum</option>
            <option value="Sepeda" {{ isset($item) ? ($item->transportasi == 'Sepeda' ? 'selected' : '') : (old('transportasi') == 'Sepeda' ? 'selected' : '') }}>
                Sepeda</option>
        </select>
    </div>
    <div class="col">
        <label for="no_kks">No KKS</label>
        <input type="text" class="form-control @error('no_kks') is-invalid @enderror" name="no_kks" id="no_kks"
            placeholder="No KKS" value="{{ isset($item) ? $item->no_kks : old('no_kks') }}" disabled>
    </div>
    <div class="col">
        <label for="kps_pkp">Penerima KPS/PKH</label>
        <select class="form-control @error('kps_pkp') is-invalid @enderror" name="kps_pkp" id="kps_pkp" disabled>
            <option value="">-- Pilih --</option>
            <option value="Tidak" {{ isset($item) ? ($item->kps_pkp == 'Tidak' ? 'selected' : '') : (old('kps_pkp') == 'Tidak' ? 'selected' : '') }}>
                Tidak</option>
            <option value="Ya" {{ isset($item) ? ($item->kps_pkp == 'Ya' ? 'selected' : '') : (old('kps_pkp') == 'Ya' ? 'selected' : '') }}>
                Ya</option>
        </select>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    </div>
    <div class="col">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    </div>
    <div class="col">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    </div>
    <div class="col">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    </div>
    <div class="col">
    </div>