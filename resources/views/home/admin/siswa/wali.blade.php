{{-- DATA KELUARGA --}}
<div class="mb-4">
    <h6 class="font-weight-bold text-dark mb-3">
        <i class="fas fa-home mr-2 text-primary"></i>
        Informasi Keluarga
    </h6>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Anak Ke-</span>
                <span class="detail-value">
                    {{ $item->anak_ke ?? '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Nama Ayah</span>
                <span class="detail-value">
                    {{ $item->nama_ayah ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Pekerjaan Ayah</span>
                <span class="detail-value">
                    {{ $item->pekerjaan_ayah ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <div class="detail-item">
                <span class="detail-label">Nama Ibu</span>
                <span class="detail-value">
                    {{ $item->nama_ibu ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <div class="detail-item">
                <span class="detail-label">Pekerjaan Ibu</span>
                <span class="detail-value">
                    {{ $item->pekerjaan_ibu ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="detail-item">
                <span class="detail-label">Nomor Telepon Orang Tua</span>
                <span class="detail-value">
                    {{ $item->no_telp ?: '-' }}
                </span>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">

{{-- INFORMASI TEMPAT TINGGAL --}}
<div class="mb-4">
    <h6 class="font-weight-bold text-dark mb-3">
        <i class="fas fa-map-marked-alt mr-2 text-primary"></i>
        Informasi Tempat Tinggal
    </h6>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Dusun</span>
                <span class="detail-value">
                    {{ $item->dusun ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Lintang</span>
                <span class="detail-value">
                    {{ $item->lintang ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="detail-item">
                <span class="detail-label">Bujur</span>
                <span class="detail-value">
                    {{ $item->bujur ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-6 mb-3 mb-md-0">
            <div class="detail-item">
                <span class="detail-label">Status Tempat Tinggal</span>
                <span class="detail-value">
                    {{ $item->status_tempat ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="detail-item">
                <span class="detail-label">Transportasi</span>
                <span class="detail-value">
                    {{ $item->transportasi ?: '-' }}
                </span>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">

{{-- INFORMASI BANTUAN SOSIAL --}}
<div class="mb-4">
    <h6 class="font-weight-bold text-dark mb-3">
        <i class="fas fa-hands-helping mr-2 text-primary"></i>
        Informasi Bantuan Sosial
    </h6>

    <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="detail-item">
                <span class="detail-label">Nomor KKS</span>
                <span class="detail-value">
                    {{ $item->no_kks ?: '-' }}
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="detail-item">
                <span class="detail-label">Penerima KPS/PKH</span>
                <span class="detail-value">
                    {{ $item->kps_pkp ?: '-' }}
                </span>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">

{{-- INFORMASI NILAI --}}
<div>
    <h6 class="font-weight-bold text-dark mb-3">
        <i class="fas fa-chart-line mr-2 text-primary"></i>
        Informasi Nilai
    </h6>

    <div class="row">
        <div class="col-md-6">
            <div class="detail-item">
                <span class="detail-label">Nilai Rata-Rata</span>
                <span class="detail-value">
                    {{ $item->nilai_rata ?? '-' }}
                </span>
            </div>
        </div>
    </div>
</div>