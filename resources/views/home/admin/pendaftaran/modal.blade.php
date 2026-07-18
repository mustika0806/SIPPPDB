{{-- Modal Edit Jadwal Pendaftaran --}}
<div
    class="modal fade"
    id="editPendaftaran-{{ $loop->iteration }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editPendaftaranLabel-{{ $loop->iteration }}"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-warning text-dark">

                <h5
                    class="modal-title font-weight-bold"
                    id="editPendaftaranLabel-{{ $loop->iteration }}"
                >
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Edit Jadwal Pendaftaran
                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Tutup"
                >
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>

            </div>

            <form
                action="{{ route(
                    'admin.pendaftaran.update',
                    $item->id
                ) }}"
                method="POST"
            >
                @csrf

                <div class="modal-body">

                    {{-- Gelombang --}}
                    <div class="form-group">

                        <label
                            for="gelombang-{{ $item->id }}"
                            class="font-weight-bold"
                        >
                            Gelombang
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="gelombang"
                            id="gelombang-{{ $item->id }}"
                            class="form-control
                                @error('gelombang') is-invalid @enderror"
                            value="{{ old(
                                'gelombang',
                                $item->gelombang
                            ) }}"
                            placeholder="Contoh: Gelombang 1"
                            required
                        >

                        @error('gelombang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <hr>

                    <h6 class="font-weight-bold text-primary mb-3">
                        <i class="fas fa-user-plus mr-1"></i>
                        Jadwal Pendaftaran
                    </h6>

                    <div class="row">

                        {{-- Tanggal buka pendaftaran --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_buka_pendaftaran-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Pendaftaran
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_pendaftaran"
                                    id="tanggal_buka_pendaftaran-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_buka_pendaftaran')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_pendaftaran',
                                        optional(
                                            $item->tanggal_buka_pendaftaran
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_pendaftaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- Tanggal akhir pendaftaran --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_pendaftaran-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Pendaftaran
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_pendaftaran"
                                    id="tanggal_akhir_pendaftaran-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_akhir_pendaftaran')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_pendaftaran',
                                        optional(
                                            $item->tanggal_akhir_pendaftaran
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_pendaftaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <hr>

                    <h6 class="font-weight-bold text-success mb-3">
                        <i class="fas fa-clipboard-check mr-1"></i>
                        Jadwal Seleksi
                    </h6>

                    <div class="row">

                        {{-- Tanggal buka seleksi --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_buka_seleksi-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Seleksi
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_seleksi"
                                    id="tanggal_buka_seleksi-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_buka_seleksi')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_seleksi',
                                        optional(
                                            $item->tanggal_buka_seleksi
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_seleksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- Tanggal akhir seleksi --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_seleksi-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Seleksi
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_seleksi"
                                    id="tanggal_akhir_seleksi-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_akhir_seleksi')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_seleksi',
                                        optional(
                                            $item->tanggal_akhir_seleksi
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_seleksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <hr>

                    <h6 class="font-weight-bold text-info mb-3">
                        <i class="fas fa-bullhorn mr-1"></i>
                        Jadwal Pengumuman
                    </h6>

                    <div class="row">

                        {{-- Tanggal buka pengumuman --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_buka_pengumuman-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Buka Pengumuman
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_buka_pengumuman"
                                    id="tanggal_buka_pengumuman-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_buka_pengumuman')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_buka_pengumuman',
                                        optional(
                                            $item->tanggal_buka_pengumuman
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_buka_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- Tanggal akhir pengumuman --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tanggal_akhir_pengumuman-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tanggal Akhir Pengumuman
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_akhir_pengumuman"
                                    id="tanggal_akhir_pengumuman-{{ $item->id }}"
                                    class="form-control
                                        @error('tanggal_akhir_pengumuman')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tanggal_akhir_pengumuman',
                                        optional(
                                            $item->tanggal_akhir_pengumuman
                                        )->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('tanggal_akhir_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        {{-- Tahun akademik --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="tahun_akademik-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Tahun Akademik
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="tahun_akademik"
                                    id="tahun_akademik-{{ $item->id }}"
                                    class="form-control
                                        @error('tahun_akademik')
                                            is-invalid
                                        @enderror"
                                    value="{{ old(
                                        'tahun_akademik',
                                        $item->tahun_akademik
                                    ) }}"
                                    placeholder="Contoh: 2026/2027"
                                    required
                                >

                                @error('tahun_akademik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label
                                    for="status-{{ $item->id }}"
                                    class="font-weight-bold"
                                >
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="status"
                                    id="status-{{ $item->id }}"
                                    class="form-control
                                        @error('status')
                                            is-invalid
                                        @enderror"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Status --
                                    </option>

                                    <option
                                        value="Aktif"
                                        {{ old(
                                            'status',
                                            $item->status
                                        ) === 'Aktif'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        Aktif
                                    </option>

                                    <option
                                        value="Tidak Aktif"
                                        {{ old(
                                            'status',
                                            $item->status
                                        ) === 'Tidak Aktif'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        Tidak Aktif
                                    </option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        <i class="fas fa-times mr-1"></i>
                        Tutup
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-save mr-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>