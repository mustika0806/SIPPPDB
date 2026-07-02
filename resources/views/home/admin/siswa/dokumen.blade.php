<!-- Logout Modal-->
<div class="modal fade" id="dokumenSiswa-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Dokumen Siswa</h5>
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
                                        alt="gambar Berkas KK" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas KTP</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_ktp != null ? url($item->dokumen_siswa->file_ktp) : '' }}"
                                        alt="gambar Berkas KTP" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Akta</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_akta != null ? url($item->dokumen_siswa->file_akta) : '' }}"
                                        alt="gambar Berkas Akta" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Raport</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_raport != null ? url($item->dokumen_siswa->file_raport) : '' }}"
                                        alt="gambar Berkas Raport" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Ijazah SMP</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_ijazah != null ? url($item->dokumen_siswa->file_ijazah) : '' }}"
                                        alt="gambar Berkas Ijazah" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas KKP, KIP, dll</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_kip != null ? url($item->dokumen_siswa->file_kip) : '' }}"
                                        alt="gambar Berkas KIP" style="width: 100%; max-width: 600px; height: auto;"
                                        class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Surat Pindahan</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_keputusan != null ? url($item->dokumen_siswa->file_keputusan) : '' }}"
                                        alt="gambar Berkas Surat Pindahan"
                                        style="width: 100%; max-width: 600px; height: auto;" class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <td>Pas Foto</td>
                                <td>
                                    <img src="{{ $item->dokumen_siswa->file_foto != null ? url($item->dokumen_siswa->file_foto) : '' }}"
                                        alt="gambar Berkas Pas Foto"
                                        style="width: 100%; max-width: 600px; height: auto;" class="img-fluid">
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