<!-- Logout Modal-->
<div class="modal fade" id="dokumenSiswa-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Upload Berkas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        @if (isset($item->dokumen_siswa->file_kk))
                            <tr>
                                <td>Berkas KK</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_kk != null ? url($item->dokumen_siswa->file_kk) : '' }}"
                                        alt="gambar" max-height="100" width="100" class="img-fluid"></img>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Akta</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_akta != null ? url($item->dokumen_siswa->file_akta) : '' }}"
                                        alt="gambar" max-height="100" width="100" class="img-fluid"></img>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Raport</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_raport != null ? url($item->dokumen_siswa->file_raport) : '' }}"
                                        alt="gambar" max-height="100" width="100" class="img-fluid"></img>
                                </td>
                            </tr>
                            <tr>
                                <td>Pas Foto</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_foto != null ? url($item->dokumen_siswa->file_foto) : '' }}"
                                        alt="gambar" width="100" class="img-fluid">
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
