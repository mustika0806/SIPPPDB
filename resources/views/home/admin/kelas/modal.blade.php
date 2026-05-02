<!-- Logout Modal-->
<div class="modal fade" id="editKelas-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kelas - {{ $item->nama }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.kelas.update', $item->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="" class="form-control"
                            placeholder="nama_jurusan" value="{{ $item->nama_jurusan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Jurusan</label>
                        <input type="text" name="deskripsi_jurusan" id="" class="form-control"
                            placeholder="deskripsi_jurusan" value="{{ $item->deskripsi_jurusan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kuota Tersedia</label>
                        <input type="number" name="kuota_tersedia" id="" class="form-control"
                            placeholder="kuota_tersedia" value="{{ $item->kuota_tersedia }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
