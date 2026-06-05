<!-- Logout Modal-->
<div class="modal fade" id="detailSiswa-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Biodata Siswa
                    @if ($item->pindahan == 'Ya')
                        <span class="badge bg-warning">Pindahan</span>
                    @endif
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nama Lengkap" value="{{ $item->user->name }}" disabled>
                    </div>
                    <div class="col">
                        <label for="nama_panggilan">Nama Panggilan</label>
                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror"
                            name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan"
                            value="{{ isset($item) ? $item->nama_panggilan : old('nama_panggilan') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror"
                            name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan"
                            value="{{ isset($item) ? $item->tinggi_badan : old('tinggi_badan') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="berat_badan">Berat Badan</label>
                        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror"
                            name="berat_badan" id="berat_badan" placeholder="Berat Badan"
                            value="{{ isset($item) ? $item->berat_badan : old('berat_badan') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="kelas_id">Jurusan</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"
                            id="kelas_id" disabled>
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}"
                                    {{ isset($item) ? ($item->kelas_id == $kls->id ? 'selected' : '') : (old('kelas_id') == $kls->id ? 'selected' : '') }}>
                                    {{ $kls->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control @error('tanggal_pendaftaran') is-invalid @enderror"
                            name="tanggal_pendaftaran" id="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran"
                            value="{{ isset($item) ? $item->tanggal_pendaftaran : old('tanggal_pendaftaran') }}"
                            disabled>
                    </div>
                    <div class="col">
                        <label for="agama">Agama</label>
                        <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama"
                            disabled>
                            <option value="">-- Pilih Agama --</option>
                            <option value="islam"
                                {{ isset($item) ? ($item->agama == 'islam' ? 'selected' : '') : (old('agam') == 'islam' ? 'selected' : '') }}>
                                islam</option>
                            <option value="kristen"
                                {{ isset($item) ? ($item->agama == 'kristen' ? 'selected' : '') : (old('agama') == 'kristen' ? 'selected' : '') }}>
                                kristen</option>
                            <option value="katholik"
                                {{ isset($item) ? ($item->agama == 'katholik' ? 'selected' : '') : (old('agam') == 'katholik' ? 'selected' : '') }}>
                                katholik</option>
                            <option value="hindu"
                                {{ isset($item) ? ($item->agama == 'hindu' ? 'selected' : '') : (old('agama') == 'hindu' ? 'selected' : '') }}>
                                hindu</option>
                            <option value="budha"
                                {{ isset($item) ? ($item->agama == 'budha' ? 'selected' : '') : (old('agam') == 'budha' ? 'selected' : '') }}>
                                budha</option>
                            <option value="konghuchu"
                                {{ isset($item) ? ($item->agama == 'konghuchu' ? 'selected' : '') : (old('agama') == 'konghuchu' ? 'selected' : '') }}>
                                konghuchu</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                            id="jenis_kelamin" disabled>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki"
                                {{ isset($item) ? ($item->jenis_kelamin == 'Laki-Laki' ? 'selected' : '') : (old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '') }}>
                                Laki-Laki</option>
                            <option value="Perempuan"
                                {{ isset($item) ? ($item->jenis_kelamin == 'Perempuan' ? 'selected' : '') : (old('jenis_kelamin') == 'Perempuan' ? 'selected' : '') }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="jumlah_saudara">Jumlah Saudara</label>
                        <input type="text" class="form-control @error('jumlah_saudara') is-invalid @enderror"
                            name="jumlah_saudara" id="jumlah_saudara" placeholder="Kandung, Tiri, Angkat"
                            value="{{ isset($item) ? $item->jumlah_saudara : old('jumlah_saudara') }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                            value="{{ isset($item) ? $item->tempat_lahir : old('tempat_lahir') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="rt_rw">RT/RW</label>
                        <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                            name="rt_rw" id="rt_rw" placeholder="RT/RW"
                            value="{{ isset($item) ? $item->rt_rw : old('rt_rw') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                            name="kode_pos" id="kode_pos" placeholder="Kode Pos"
                            value="{{ isset($item) ? $item->kode_pos : old('kode_pos') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"
                            value="{{ isset($item) ? $item->tanggal_lahir : old('tanggal_lahir') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                            name="provinsi" id="provinsi" placeholder="provinsi"
                            value="{{ isset($item) ? $item->provinsi : old('provinsi') }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                            name="kelurahan" id="kelurahan" placeholder="Kelurahan"
                            value="{{ isset($item) ? $item->kelurahan : old('kelurahan') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                            name="kecamatan" id="kecamatan" placeholder="Kecamatan"
                            value="{{ isset($item) ? $item->kelurahan : old('kecamatan') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="kota">Kota/Kabupaten</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror"
                            name="kota" id="kota" placeholder="Kota/Kabupaten"
                            value="{{ isset($item) ? $item->kota : old('kota') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="no_telp">No Telp Ortu</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                            name="no_telp" id="no_telp" placeholder="No Telp Ortu"
                            value="{{ isset($item) ? $item->no_telp : old('no_telp') }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="alamat_asal">Alamat</label>
                        <input type="text" class="form-control @error('alamat_asal') is-invalid @enderror"
                            name="alamat_asal" id="alamat_asal" placeholder="Alamat Asal"
                            value="{{ isset($item) ? $item->alamat_asal : old('alamat_asal') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="no_hp">No Hp Siswa</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp" id="no_hp" placeholder="No Hp Siswa"
                            value="{{ isset($item) ? $item->no_hp : old('no_hp') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="alamat_email">Alamat Email</label>
                        <input type="text" class="form-control @error('alamat_email') is-invalid @enderror"
                            name="alamat_email" id="alamat_email" placeholder="Alamat Email"
                            value="{{ isset($item) ? $item->alamat_email : old('alamat_email') }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="kegiatan_olahraga">Kegiatan Olahraga</label>
                        <select class="form-control @error('kegiatan_olahraga') is-invalid @enderror"
                            name="kegiatan_olahraga" id="kegiatan_olahraga" disabled>
                            <option value="Aktif"
                                {{ isset($item) ? ($item->kegiatan_olahraga == 'Aktif' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Aktif' ? 'selected' : '') }}>
                                Aktif</option>
                            <option value="Cukup"
                                {{ isset($item) ? ($item->kegiatan_olahraga == 'Cukup' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Cukup' ? 'selected' : '') }}>
                                Cukup</option>
                            <option value="Kurang"
                                {{ isset($item) ? ($item->kegiatan_olahraga == 'Kurang' ? 'selected' : '') : (old('kegiatan_olahraga') == 'Kurang' ? 'selected' : '') }}>
                                Kurang</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kegiatan_kesenian">Kegiatan Kesenian</label>
                        <select class="form-control @error('kegiatan_kesenian') is-invalid @enderror"
                            name="kegiatan_kesenian" id="kegiatan_kesenian" disabled>
                            <option value="Aktif"
                                {{ isset($item) ? ($item->kegiatan_kesenian == 'Aktif' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Aktif' ? 'selected' : '') }}>
                                Aktif</option>
                            <option value="Cukup"
                                {{ isset($item) ? ($item->kegiatan_kesenian == 'Cukup' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Cukup' ? 'selected' : '') }}>
                                Cukup</option>
                            <option value="Kurang"
                                {{ isset($item) ? ($item->kegiatan_kesenian == 'Kurang' ? 'selected' : '') : (old('kegiatan_kesenian') == 'Kurang' ? 'selected' : '') }}>
                                Kurang</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="prestasi">Prestasi yang dicapai</label>
                        <input type="text" class="form-control @error('prestasi') is-invalid @enderror"
                            name="prestasi" id="prestasi" placeholder=""
                            value="{{ isset($item) ? $item->prestasi : old('prestasi') }}" disabled>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="sekolah_asal">Sekolah Asal</label>
                        <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror"
                            name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah Asal"
                            value="{{ isset($item) ? $item->sekolah_asal : old('sekolah_asal') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="nilai_ijazah">Nilai Ijazah</label>
                        <input type="number" class="form-control @error('nilai_ijazah') is-invalid @enderror"
                            name="nilai_ijazah" id="nilai_ijazah" placeholder="Nilai Ijazah"
                            value="{{ isset($item) ? $item->nilai_ijazah : old('nilai_ijazah') }}" disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                            name="nisn" id="nisn" placeholder="NISN"
                            value="{{ isset($item) ? $item->nisn : old('nisn') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="status_tempat">Status Tempat Tinggal</label>
                        <select class="form-control @error('status_tempat') is-invalid @enderror"
                            name="status_tempat" id="status_tempat" disabled>
                            <option value="rumah sendiri"
                                {{ isset($item) ? ($item->status_tempat == 'rumah sendiri' ? 'selected' : '') : (old('status_tempat') == 'rumah sendiri' ? 'selected' : '') }}>
                                rumah sendiri</option>
                            <option value="kontrakan"
                                {{ isset($item) ? ($item->status_tempat == 'kontrakan' ? 'selected' : '') : (old('status_tempat') == 'kontrakan' ? 'selected' : '') }}>
                                kontrakan</option>
                            <option value="kosan"
                                {{ isset($item) ? ($item->status_tempat == 'kosan' ? 'selected' : '') : (old('status_tempat') == 'kosan' ? 'selected' : '') }}>
                                kosan</option>
                        </select>
                    </div>
                    @include('home.admin.siswa.wali')
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>