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
                        <label for="kelas_id">Jurusan</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"
                            id="kelas_id" disabled>
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}" {{ isset($item) ? ($item->kelas_id == $kls->id ? 'selected' : '') : (old('kelas_id') == $kls->id ? 'selected' : '') }}>
                                    {{ $kls->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="tanggal_pendafatran">Tanggal Pendaftaran</label>
                        <input type="text" class="form-control @error('tanggal_pendafatran') is-invalid @enderror"
                            name="tanggal_pendaftaran" id="tanggal_pendafatran" placeholder="Tanggal Pendaftaran"
                            value="{{ isset($item) ? $item->tanggal_pendaftaran : old('tanggal_pendaftaran') }}"
                            disabled>
                    </div>
                    <div class="col">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                            id="jenis_kelamin" disabled>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki" {{ isset($item) ? ($item->jenis_kelamin == 'Laki-Laki' ? 'selected' : '') : (old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '') }}>
                                Laki-Laki</option>
                            <option value="Perempuan" {{ isset($item) ? ($item->jenis_kelamin == 'Perempuan' ? 'selected' : '') : (old('jenis_kelamin') == 'Perempuan' ? 'selected' : '') }}>
                                Perempuan</option>
                        </select>
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
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"
                            value="{{ isset($item) ? $item->tanggal_lahir : old('tanggal_lahir') }}" disabled>
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
                        <label for="alamat_asal">Alamat</label>
                        <input type="text" class="form-control @error('alamat_asal') is-invalid @enderror"
                            name="alamat_asal" id="alamat_asal" placeholder="Alamat Asal"
                            value="{{ isset($item) ? $item->alamat_asal : old('alamat_asal') }}" disabled>
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
                        <label for="sekolah_asal">Sekolah Asal</label>
                        <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror"
                            name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah Asal"
                            value="{{ isset($item) ? $item->sekolah_asal : old('sekolah_asal') }}" disabled>
                    </div>
                    <div class="col">
                        <label for="ijazah_terakhir">Ijazah Terakhir</label>
                        <select class="form-control @error('ijazah_terakhir') is-invalid @enderror"
                            name="ijazah_terakhir" id="ijazah_terakhir" disabled>
                            <option value="">-- Pilih Ijazah Terakhir --</option>
                            <option value="SMP NEGERI" {{ isset($item) ? ($item->ijazah_terakhir == 'SMP NEGERI' ? 'selected' : '') : (old('ijazah_terakhir') == 'SMP NEGERI' ? 'selected' : '') }}>
                                SMP NEGERI</option>
                            <option value="SMP SWASTA" {{ isset($item) ? ($item->ijazah_terakhir == 'SMP SWASTA' ? 'selected' : '') : (old('ijazah_terakhir') == 'SMP SWASTA' ? 'selected' : '') }}>
                                SMP SWASTA</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                            id="nisn" placeholder="NISN" value="{{ isset($item) ? $item->nisn : old('nisn') }}"
                            disabled>
                    </div>
                    @include('home.admin.siswa.wali')
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
            <hr>
        </div>
    </div>
</div>