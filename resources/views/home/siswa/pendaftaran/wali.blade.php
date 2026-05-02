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
            <label for="asal_sekolah">Asal Sekolah</label>
            <select class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah"
                id="asal_sekolah" placeholder="Asal Sekolah"
                value="{{ isset($siswa) ? $siswa->asal_sekolah : old('asal_sekolah') }}">
                <option value="" selected disabled>--- Asal Sekolah ---</option>
                @foreach (\App\Helpers\EnumHelper::SubKriteria['Asal Sekolah'] as $asalSekolah)
                    <option value="{{ $asalSekolah }}" {{ $siswa->asal_sekolah == $asalSekolah ? 'selected' : '' }}>
                        {{ $asalSekolah }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="nilai_rata">Nilai Rata</label>
            <input type="number" class="form-control @error('nilai_rata') is-invalid @enderror" name="nilai_rata"
                id="nilai_rata" placeholder="Nilai Rata"
                value="{{ isset($siswa) ? $siswa->nilai_rata : old('nilai_rata') }}">
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
                var asal_sekolah = $('#asal_sekolah').val();
                var nilai_rata = $('#nilai_rata').val();
                $.ajax({
                    url: '{{ route('siswa.pendaftaran.wali') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        asal_sekolah: asal_sekolah,
                        nilai_rata: nilai_rata,
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
