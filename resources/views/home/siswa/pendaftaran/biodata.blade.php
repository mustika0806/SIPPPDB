<div class="row">
    <div class="col">
        <label for="name">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="nama_panggilan">Nama Panggilan</label>
        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan"
            id="nama_panggilan" placeholder="Nama Panggilan"
            value="{{ isset($siswa) ? $siswa->nama_panggilan : old('nama_panggilan') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="tinggi_badan">Tinggi Badan</label>
        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan"
            id="tinggi_badan" placeholder="Tinggi Badan"
            value="{{ isset($siswa) ? $siswa->tinggi_badan : old('tinggi_badan') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="berat_badan">Berat Badan</label>
        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan"
            id="berat_badan" placeholder="Berat Badan"
            value="{{ isset($siswa) ? $siswa->berat_badan : old('berat_badan') }}">
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
        <label for="agama">Agama</label>
        <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
            <option value="">-- Pilih Agama --</option>
            <option value="islam"
                {{ isset($siswa) ? ($siswa->agama == 'islam' ? 'selected' : '') : (old('agam') == 'islam' ? 'selected' : '') }}>
                islam</option>
            <option value="kristen"
                {{ isset($siswa) ? ($siswa->agama == 'kristen' ? 'selected' : '') : (old('agama') == 'kristen' ? 'selected' : '') }}>
                kristen</option>
            <option value="katholik"
                {{ isset($siswa) ? ($siswa->agama == 'katholik' ? 'selected' : '') : (old('agam') == 'katholik' ? 'selected' : '') }}>
                katholik</option>
            <option value="hindu"
                {{ isset($siswa) ? ($siswa->agama == 'hindu' ? 'selected' : '') : (old('agama') == 'hindu' ? 'selected' : '') }}>
                hindu</option>
            <option value="budha"
                {{ isset($siswa) ? ($siswa->agama == 'budha' ? 'selected' : '') : (old('agam') == 'budha' ? 'selected' : '') }}>
                budha</option>
            <option value="konghuchu"
                {{ isset($siswa) ? ($siswa->agama == 'konghuchu' ? 'selected' : '') : (old('agama') == 'konghuchu' ? 'selected' : '') }}>
                konghuchu</option>
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
    <div class="col">
        <label for="jumlah_saudara">Jumlah Saudara</label>
        <input type="text" class="form-control @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara"
            id="jumlah_saudara" placeholder="Kandung, Tiri, Angkat"
            value="{{ isset($siswa) ? $siswa->jumlah_saudara : old('jumlah_saudara') }}">
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
        <label for="rt_rw">RT/RW</label>
        <input type="text" class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw"
            id="rt_rw" placeholder="RT/RW" value="{{ isset($siswa) ? $siswa->rt_rw : old('rt_rw') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="kode_pos">Kode Pos</label>
        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
            id="kode_pos" placeholder="Kode Pos" value="{{ isset($siswa) ? $siswa->kode_pos : old('kode_pos') }}">
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
        <label for="kelurahan">Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan"
            id="kelurahan" placeholder="Kelurahan"
            value="{{ isset($siswa) ? $siswa->kelurahan : old('kelurahan') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="kecamatan">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
            id="kecamatan" placeholder="Kecamatan"
            value="{{ isset($siswa) ? $siswa->kelurahan : old('kecamatan') }}">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="kota">Kota/Kabupaten</label>
        <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota"
            id="kota" placeholder="Kota/Kabupaten" value="{{ isset($siswa) ? $siswa->kota : old('kota') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="provinsi">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
            id="provinsi" placeholder="provinsi" value="{{ isset($siswa) ? $siswa->provinsi : old('provinsi') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="no_telp">No Telp Ortu</label>
        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
            id="no_telp" placeholder="No Telp Ortu"
            value="{{ isset($siswa) ? $siswa->no_telp : old('no_telp') }}">
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="no_hp">No Hp Siswa</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
            id="no_hp" placeholder="No Hp Siswa" value="{{ isset($siswa) ? $siswa->no_hp : old('no_hp') }}">
        <div class="invalid-feedback">
        </div>
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="alamat_email">Alamat Email</label>
        <input type="text" class="form-control @error('alamat_email') is-invalid @enderror" name="alamat_email"
            id="alamat_email" placeholder="Alamat Email"
            value="{{ isset($siswa) ? $siswa->alamat_email : old('alamat_email') }}">
        <div class="invalid-feedback">
        </div>
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="kegiatan_olahraga">Kegiatan Olahraga</label>
        <select class="form-control @error('kegiatan_olahraga') is-invalid @enderror" name="kegiatan_olahraga"
            id="kegiatan_olahraga">
            <option value="Aktif"
                {{ isset($siswa) ? ($siswa->kegiatan_olahraga == 'Aktif' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Aktif' ? 'selected' : '') }}>
                Aktif</option>
            <option value="Cukup"
                {{ isset($siswa) ? ($siswa->kegiatan_olahraga == 'Cukup' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Cukup' ? 'selected' : '') }}>
                Cukup</option>
            <option value="Kurang"
                {{ isset($siswa) ? ($siswa->kegiatan_olahraga == 'Kurang' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Kurang' ? 'selected' : '') }}>
                Kurang</option>
        </select>
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="col">
        <label for="kegiatan_kesenian">Kegiatan Kesenian</label>
        <select class="form-control @error('kegiatan_kesenian') is-invalid @enderror" name="kegiatan_kesenian"
            id="kegiatan_kesenian">
            <option value="Aktif"
                {{ isset($siswa) ? ($siswa->kegiatan_kesenian == 'Aktif' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Aktif' ? 'selected' : '') }}>
                Aktif</option>
            <option value="Cukup"
                {{ isset($siswa) ? ($siswa->kegiatan_kesenian == 'Cukup' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Cukup' ? 'selected' : '') }}>
                Cukup</option>
            <option value="Kurang"
                {{ isset($siswa) ? ($siswa->kegiatan_kesenian == 'Kurang' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Kurang' ? 'selected' : '') }}>
                Kurang</option>
        </select>
        <div class="invalid-feedback">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="prestasi">Prestasi yang dicapai</label>
        <input type="text" class="form-control @error('prestasi') is-invalid @enderror" name="prestasi"
            id="prestasi" placeholder="" value="{{ isset($siswa) ? $siswa->prestasi : old('prestasi') }}">
        <div class="invalid-feedback">
        </div>
    </div>
    <div class="invalid-feedback">
    </div>
    <div class="col">
        <label for="status_tempat">Status Tempat Tinggal</label>
        <select class="form-control @error('status_tempat') is-invalid @enderror" name="status_tempat"
            id="status_tempat">
            <option value="rumah sendiri"
                {{ isset($siswa) ? ($siswa->status_tempat == 'rumah sendiri' ? 'selected' : '') : (old('status_tempat') == 'rumah sendiri' ? 'selected' : '') }}>
                rumah sendiri</option>
            <option value="kontrakan"
                {{ isset($siswa) ? ($siswa->status_tempat == 'kontrakan' ? 'selected' : '') : (old('status_tempat') == 'kontrakan' ? 'selected' : '') }}>
                kontrakan</option>
            <option value="kosan"
                {{ isset($siswa) ? ($siswa->status_tempat == 'kosan' ? 'selected' : '') : (old('status_tempat') == 'kosan' ? 'selected' : '') }}>
                kosan</option>
        </select>
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
                var nama_panggilan = $('#nama_panggilan').val();
                var tinggi_badan = $('#tinggi_badan').val();
                var berat_badan = $('#berat_badan').val();
                var tanggal_pendaftaran = $('#tanggal_pendaftaran').val();
                var jenis_kelamin = $('#jenis_kelamin').val();
                var agama = $('#agama').val();
                var tanggal_lahir = $('#tanggal_lahir').val();
                var jumlah_saudara = $('#jumlah_saudara').val();
                var tempat_lahir = $('#tempat_lahir').val();
                var rt_rw = $('#rt_rw').val();
                var kode_pos = $('#kode_pos').val();
                var alamat_asal = $('#alamat_asal').val();
                var kelurahan = $('#kelurahan').val();
                var kecamatan = $('#kecamatan').val();
                var kota = $('#kota').val();
                var provinsi = $('#provinsi').val();
                var no_telp = $('#no_telp').val();
                var no_hp = $('#no_hp').val();
                var alamat_email = $('#alamat_email').val();
                var kegiatan_olahraga = $('#kegiatan_olahraga').val();
                var kegiatan_kesenian = $('#kegiatan_kesenian').val();
                var prestasi = $('#prestasi').val();
                var status_tempat = $('#status_tempat').val();
                $.ajax({
                    url: '{{ route('siswa.pendaftaran.biodata') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        nama_panggilan: nama_panggilan,
                        tinggi_badan: tinggi_badan,
                        berat_badan: berat_badan,
                        tanggal_pendaftaran: tanggal_pendaftaran,
                        jenis_kelamin: jenis_kelamin,
                        agama: agama,
                        tanggal_lahir: tanggal_lahir,
                        jumlah_saudara: jumlah_saudara,
                        tempat_lahir: tempat_lahir,
                        rt_rw: rt_rw,
                        kode_pos: kode_pos,
                        alamat_asal: alamat_asal,
                        kelurahan: kelurahan,
                        kecamatan: kecamatan,
                        kota: kota,
                        provinsi: provinsi,
                        no_telp: no_telp,
                        no_hp: no_hp,
                        alamat_email: alamat_email,
                        kegiatan_olahraga: kegiatan_olahraga,
                        kegiatan_kesenian: kegiatan_kesenian,
                        prestasi: prestasi,
                        status_tempat: status_tempat,
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