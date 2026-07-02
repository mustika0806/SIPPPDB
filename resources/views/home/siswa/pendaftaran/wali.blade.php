<div class="row mt-2">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col" id="father">
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="sekolah_asal">Asal Sekolah</label>
            <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror" name="sekolah_asal"
                id="sekolah_asal" placeholder="inputkan jika asal sekolah tidak terdaftar di halaman sebelumnya"
                value="{{ isset($siswa) ? $siswa->sekolah_asal : old('sekolah_asal') }}">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="nilai_ijazah">Nilai Ijazah</label>
            <input type="number" class="form-control @error('nilai_ijazah') is-invalid @enderror" name="nilai_ijazah"
                id="nilai_ijazah" placeholder="Nilai Ijazah"
                value="{{ isset($siswa) ? $siswa->nilai_ijazah : old('nilai_ijazah') }}">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="nilai_rata">Nilai Ujian Sekolah</label>
            <input type="number" class="form-control @error('nilai_rata') is-invalid @enderror" name="nilai_rata"
                id="nilai_rata" placeholder="Nilai Rata"
                value="{{ isset($siswa) ? $siswa->nilai_rata : old('nilai_rata') }}">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn"
                placeholder="NISN" value="{{ isset($siswa) ? $siswa->nisn : old('nisn') }}">
            <div class="invalid-feedback">
            </div>
        </div>
    </div>
    <div class="col" id="mother">
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
    </div>
</div>
<div class="row mt-2" id="parentAddress">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
{{-- wali --}}
<h3 class="mt-5 font-weight-bold"></h3>
<div class="row mt-2">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
@push('js')
    <script>
        var siswa = @json($siswa);
        if (!siswa) {
            window.location.href = '{{ route('siswa.pendaftaran.index') }}?step=kelas';
        }
        $(document).ready(function() {
            $('#next').on('click', function() {
                var sekolah_asal = $('#sekolah_asal').val();
                var nilai_ijazah = $('#nilai_ijazah').val();
                var nilai_rata = $('#nilai_rata').val();
                var nisn = $('#nisn').val();
                $.ajax({
                    url: '{{ route('siswa.pendaftaran.wali') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        sekolah_asal: sekolah_asal,
                        nilai_ijazah: nilai_ijazah,
                        nilai_rata: nilai_rata,
                        nisn: nisn,
                    },
                    success: function(response) {
                        window.location.href = response.url;
                    },
                    error: function(xhr) {
                        var res = xhr.responseJSON;
                        toastr.error('Mohon inputkan data yang valid');
                        if (res.errors) {
                            $.each(res.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).closest('.col').find('.invalid-feedback')
                                    .text(value);
                            });
                        }
                    }
                })
            })
        })
    </script>
@endpush