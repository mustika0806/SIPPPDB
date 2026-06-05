<div class="row mt-2">
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="nilai_ijazah">Nilai Ijazah</label>
        <input type="number" class="form-control @error('nilai_ijazah') is-invalid @enderror" name="nilai_ijazah"
            id="nilai_ijazah" placeholder="Nilai Ijazah"
            value="{{ isset($siswa) ? $siswa->nilai_ijazah : old('nilai_ijazah') }}">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="nisn">NISN</label>
        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn"
            placeholder="NISN" value="{{ isset($siswa) ? $siswa->nisn : old('nisn') }}">
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
                var nilai_ijazah = $('#nilai_ijazah').val();
                var nisn = $('#nisn').val();
                $.ajax({
                    url: '{{ route('siswa.pendaftaran.sekolah') }}',
                    type: 'POST',
                    data: {
                        nilai_ijazah: nilai_ijazah,
                        nisn: nisn,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = response.url;
                    },
                    error: function(xhr) {
                        var res = xhr.responseJSON;
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