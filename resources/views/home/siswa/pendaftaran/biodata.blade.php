<div class="row">
    <div class="col">
        <label for="name">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
        <input type="date" class="form-control @error('tanggal_pendaftaran') is-invalid @enderror"
            name="tanggal_pendaftaran" id="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran"
            value="{{ isset($siswa) ? $siswa->tanggal_pendaftaran : old('tanggal_pendaftaran') }}">
        <div class="invalid-feedback">
        </div>
    </div>

</div>
<div class="row mt-2">
    <div class="col">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
            id="jenis_kelamin">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki"
                {{ isset($siswa) ? ($siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '') : (old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '') }}>
                Laki-Laki</option>
            <option value="Perempuan"
                {{ isset($siswa) ? ($siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '') : (old('jenis_kelamin') == 'Perempuan' ? 'selected' : '') }}>
                Perempuan</option>
        </select>
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
            id="tanggal_lahir" placeholder="Tanggal Lahir"
            value="{{ isset($siswa) ? $siswa->tanggal_lahir : old('tanggal_lahir') }}">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
{{-- tetala --}}
<div class="row mt-2">
    <div class="col">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
            id="tempat_lahir" placeholder="Tempat Lahir"
            value="{{ isset($siswa) ? $siswa->tempat_lahir : old('tempat_lahir') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
{{-- alamat --}}
<div class="row mt-2">
    <div class="col">
        <label for="alamat_asal">Alamat</label>
        <textarea class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" id="alamat_asal"
            placeholder="Alamat Asal">{{ isset($siswa) ? $siswa->alamat_asal : old('alamat_asal') }}</textarea>
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
@push('js')
    <script>
        var siswa = @json($siswa);
        if (!siswa) {
            window.location.href = '{{ route('siswa.pendaftaran.index') }}?step=kelas';
        }
        $(document).ready(function() {
            $('#next').on('click', function() {
                var step = '{{ request()->get('step') }}';
                var kelas_id = $('#kelas_id').val();
                var name = $('#name').val();
                var tanggal_pendaftaran = $('#tanggal_pendaftaran').val();
                var jenis_kelamin = $('#jenis_kelamin').val();
                var tempat_lahir = $('#tempat_lahir').val();
                var tanggal_lahir = $('#tanggal_lahir').val();
                var alamat_asal = $('#alamat_asal').val();
                $.ajax({
                    url: '{{ route('siswa.pendaftaran.biodata') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        tanggal_pendaftaran: tanggal_pendaftaran,
                        jenis_kelamin: jenis_kelamin,
                        tempat_lahir: tempat_lahir,
                        tanggal_lahir: tanggal_lahir,
                        alamat_asal: alamat_asal,
                    },
                    success: function(response) {
                        window.location.href = response.url;
                    },
                    error: function(xhr) {
                        // make show error message to div class invalid-feedback
                        var res = xhr.responseJSON;
                        if (res.errors) {
                            $.each(res.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).closest('.col').find('.invalid-feedback')
                                    .text(value);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
