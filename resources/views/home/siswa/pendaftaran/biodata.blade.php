@extends('layouts.front.app')

@section('content')
    <section id="ppdb" class="bg-light">

        <style>
            #ppdb {
                padding: 30px 0 60px;
            }

            .card-form {
                background: #fff;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
            }

            .section-title {
                font-weight: 700;
                color: #009846;
                margin-bottom: 20px;
            }

            .block-title {
                font-weight: 700;
                margin-top: 25px;
                margin-bottom: 10px;
                color: #333;
                border-left: 4px solid #009846;
                padding-left: 10px;
            }

            label {
                font-size: 13px;
                font-weight: 600;
            }

            .form-control,
            select,
            textarea {
                font-size: 14px;
            }
        </style>

        <div class="container">

            <h3 class="text-center section-title">
                Formulir PPDB SMKS Ma’arif NU Kota Batam
            </h3>

            <div class="card card-form">

                {{-- ================= DATA SISWA ================= --}}
                <div class="block-title">Data Siswa</div>

                <div class="row">

                    <div class="col-md-4">
                        <label>Nama Lengkap</label>
                        <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="col-md-4">
                        <label>Nama Panggilan</label>
                        <input type="text" id="nama_panggilan" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Tinggi Badan</label>
                        <input type="number" id="tinggi_badan" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Berat Badan</label>
                        <input type="number" id="berat_badan" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>NIK</label>
                        <input type="text" id="nik" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Tanggal Pendaftaran</label>
                        <input type="date" id="tanggal_pendaftaran" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Jenis Kelamin</label>
                        <select id="jenis_kelamin" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Agama</label>
                        <select id="agama" class="form-control">
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Katolik</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Jumlah Saudara</label>
                        <input type="number" id="jumlah_saudara" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>No Akta Lahir</label>
                        <input type="text" id="no_akta_lahir" class="form-control">
                    </div>

                </div>

                {{-- ================= STATUS & KHUSUS ================= --}}
                <div class="block-title">Status & Kebutuhan</div>

                <div class="row">

                    <div class="col-md-4">
                        <label>Kewarganegaraan</label>
                        <select id="kewarganegaraan" class="form-control">
                            <option>Indonesia</option>
                            <option>Asing</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Kebutuhan Khusus</label>
                        <select id="kebutuhan_khusus" class="form-control">
                            <option>Tidak</option>
                            <option>Netra</option>
                            <option>Rungu</option>
                            <option>Grahita</option>
                            <option>Wicara</option>
                            <option>Daksa</option>
                            <option>Autis</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Anak Ke-</label>
                        <input type="number" id="anak_ke" class="form-control">
                    </div>

                </div>

                {{-- ================= ALAMAT ================= --}}
                <div class="block-title">Alamat Lengkap</div>

                <div class="row">

                    <div class="col-md-12">
                        <label>Alamat</label>
                        <textarea id="alamat_asal" class="form-control"></textarea>
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>RT</label>
                        <input type="text" id="rt" class="form-control">
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>RW</label>
                        <input type="text" id="rw" class="form-control">
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>Dusun</label>
                        <input type="text" id="dusun" class="form-control">
                    </div>

                    <div class="col-md-3 mt-2">
                        <label>Kode Pos</label>
                        <input type="text" id="kode_pos" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Kelurahan</label>
                        <input type="text" id="kelurahan" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Kecamatan</label>
                        <input type="text" id="kecamatan" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Kota</label>
                        <input type="text" id="kota" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Provinsi</label>
                        <input type="text" id="provinsi" class="form-control">
                    </div>

                    <div class="col-md-6 mt-2">
                        <label>Lintang</label>
                        <input type="text" id="lintang" class="form-control">
                    </div>

                    <div class="col-md-6 mt-2">
                        <label>Bujur</label>
                        <input type="text" id="bujur" class="form-control">
                    </div>

                </div>

                {{-- ================= ORANG TUA ================= --}}
                <div class="block-title">Orang Tua / Wali</div>

                <div class="row">

                    <div class="col-md-4">
                        <label>Nama Ayah</label>
                        <input type="text" id="nama_ayah" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Nama Ibu</label>
                        <input type="text" id="nama_ibu" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Pekerjaan Ayah</label>
                        <input type="text" id="pekerjaan_ayah" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Pekerjaan Ibu</label>
                        <input type="text" id="pekerjaan_ibu" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>No HP Orang Tua</label>
                        <input type="text" id="no_telp" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>No HP Siswa</label>
                        <input type="text" id="no_hp" class="form-control">
                    </div>

                </div>

                {{-- ================= Pribadi ================= --}}
                <div class="block-title">Pribadi</div>

                <div class="row">

                    <div class="col-md-4 mt-2">
                        <label>Alamat Email</label>
                        <input type="text" id="alamat_email" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Kegiatan Olahraga</label>
                        <select id="kegiatan_olahraga" class="form-control">
                            <option>Aktif</option>
                            <option>Cukup</option>
                            <option>Kurang</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Kegiatan Kesenian</label>
                        <select id="kegiatan_kesenian" class="form-control">
                            <option>Aktif</option>
                            <option>Cukup</option>
                            <option>Kurang</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Prestasi</label>
                        <input type="text" id="prestasi" class="form-control">
                    </div>

                </div>

                {{-- ================= SOSIAL ================= --}}
                <div class="block-title">Sosial Ekonomi</div>

                <div class="row">

                    <div class="col-md-4">
                        <label>Tempat Tinggal</label>
                        <select id="status_tempat" class="form-control">
                            <option>rumah sendiri</option>
                            <option>kontrakan</option>
                            <option>kosan</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Transportasi</label>
                        <select id="transportasi" class="form-control">
                            <option>Jalan Kaki</option>
                            <option>Kendaraan Pribadi</option>
                            <option>Angkutan Umum</option>
                            <option>Sepeda</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>No KKS</label>
                        <input type="text" id="no_kks" class="form-control">
                    </div>

                    <div class="col-md-4 mt-2">
                        <label>Penerima KPS/PKH</label>
                        <select id="kps_pkp" class="form-control">
                            <option>Tidak</option>
                            <option>Ya</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-success w-100 mt-4" id="next">
                    Simpan & Lanjut
                </button>

            </div>
        </div>
    </section>

    @push('js')
        <script>
            $('#next').on('click', function() {

                $.ajax({
                    url: "{{ route('siswa.pendaftaran.biodata') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",

                        name: $('#name').val(),
                        nama_panggilan: $('#nama_panggilan').val(),
                        tinggi_badan: $('#tinggi_badan').val(),
                        berat_badan: $('#berat_badan').val(),
                        nik: $('#nik').val(),
                        tanggal_pendaftaran: $('#tanggal_pendaftaran').val(),
                        jenis_kelamin: $('#jenis_kelamin').val(),
                        agama: $('#agama').val(),
                        tempat_lahir: $('#tempat_lahir').val(),
                        tanggal_lahir: $('#tanggal_lahir').val(),
                        jumlah_saudara: $('#jumlah_saudara').val(),
                        no_akta_lahir: $('#no_akta_lahir').val(),

                        kewarganegaraan: $('#kewarganegaraan').val(),
                        kebutuhan_khusus: $('#kebutuhan_khusus').val(),
                        anak_ke: $('#anak_ke').val(),

                        alamat_asal: $('#alamat_asal').val(),
                        rt: $('#rt').val(),
                        rw: $('#rw').val(),
                        dusun: $('#dusun').val(),
                        kode_pos: $('#kode_pos').val(),
                        kelurahan: $('#kelurahan').val(),
                        kecamatan: $('#kecamatan').val(),
                        kota: $('#kota').val(),
                        provinsi: $('#kota').val(),
                        lintang: $('#lintang').val(),
                        bujur: $('#bujur').val(),

                        nama_ayah: $('#nama_ayah').val(),
                        nama_ibu: $('#nama_ibu').val(),
                        pekerjaan_ayah: $('#pekerjaan_ayah').val(),
                        pekerjaan_ibu: $('#pekerjaan_ibu').val(),
                        no_telp: $('#no_telp').val(),
                        no_hp: $('#no_hp').val(),

                        alamat_email: $('#alamat_email').val(),
                        kegiatan_olahraga: $('#kegiatan_olahraga').val(),
                        kegiatan_kesenian: $('#kegiatan_kesenian').val(),
                        prestasi: $('#prestasi').val(),


                        status_tempat: $('#status_tempat').val(),
                        transportasi: $('#transportasi').val(),
                        no_kks: $('#no_kks').val(),
                        kps_pkp: $('#kps_pkp').val(),
                    },

                    success: function(res) {
                        console.log("CLICK TRIGGERED ke sukses");
                        window.location.href = res.url;
                    },

                    error: function(xhr) {
                        console.log("CLICK TRIGGERED");
                        console.log(xhr.responseJSON);
                        alert(JSON.stringify(xhr.responseJSON));
                    }
                });

            });
        </script>
    @endpush
@endsection