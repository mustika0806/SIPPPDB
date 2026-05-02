<div class="col">
</div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="asal_sekolah">Asal Sekolah</label>
        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah"
            id="asal_sekolah" placeholder="Asal Sekolah"
            value="{{ isset($item) ? $item->asal_sekolah : old('asal_sekolah') }}" disabled>
    </div>
    <div class="col">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    </div>
    <div class="col">
        <label for="nilai_rata">Nilai Rata</label>
        <input type="number" class="form-control @error('nilai_rata') is-invalid @enderror" name="nilai_rata"
            id="nilai_rata" placeholder="Nilai Rata" value="{{ isset($item) ? $item->nilai_rata : old('nilai_rata') }}"
            disabled>
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
