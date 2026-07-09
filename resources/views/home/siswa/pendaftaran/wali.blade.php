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
                    <label for="sekolah_asal">Asal Sekolah</label>
                    <input 
                        type="text" 
                        class="form-control @error('sekolah_asal') is-invalid @enderror" 
                        name="sekolah_asal"
                        id="sekolah_asal" 
                        placeholder="Inputkan asal sekolah"
                        value="{{ isset($siswa) ? $siswa->sekolah_asal : old('sekolah_asal') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input 
                        type="text" 
                        class="form-control @error('nisn') is-invalid @enderror" 
                        name="nisn" 
                        id="nisn"
                        placeholder="NISN" 
                        value="{{ isset($siswa) ? $siswa->nisn : old('nisn') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nilai_ijazah">Nilai Ijazah</label>
                    <input 
                        type="number" 
                        class="form-control @error('nilai_ijazah') is-invalid @enderror" 
                        name="nilai_ijazah"
                        id="nilai_ijazah" 
                        placeholder="Nilai Ijazah"
                        value="{{ isset($siswa) ? $siswa->nilai_ijazah : old('nilai_ijazah') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nilai_rata">Nilai Ujian Sekolah</label>
                    <input 
                        type="number" 
                        class="form-control @error('nilai_rata') is-invalid @enderror" 
                        name="nilai_rata"
                        id="nilai_rata" 
                        placeholder="Nilai rata-rata"
                        value="{{ isset($siswa) ? $siswa->nilai_rata : old('nilai_rata') }}">

                    <div class="invalid-feedback"></div>
                </div>
            </div>

        </div>

        <div class="mt-4" style="color: red; font-size: 13px;">
            <ul>
                <li>Mohon inputkan data yang valid.</li>
                <li>Ketika tombol simpan ditekan maka data tidak dapat diubah, kecuali dikonfirmasi untuk diubah oleh admin.</li>
            </ul>
        </div>

    </div>
</div>

@push('js')
    <script>
        var siswa = @json($siswa ?? null);

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

                        $('.form-control').removeClass('is-invalid');
                        $('.invalid-feedback').text('');

                        if (res.errors) {
                            $.each(res.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key)
                                    .closest('.form-group')
                                    .find('.invalid-feedback')
                                    .text(value[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush