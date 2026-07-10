<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: linear-gradient(180deg, #2d6a4f 0%, #1b4332 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ url('sekolah3-bg.png') }}" alt="logo" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">SIPPDB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if (auth()->user()->level == 'admin')

        <hr class="sidebar-divider">

        <!-- 1. Jurusan Dan Kuota -->
        <li class="nav-item {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.kelas.index') }}">
                <i class="fas fa-house-flag"></i>
                <span>Jurusan Dan Kuota</span>
            </a>
        </li>

        <!-- 2. Pembayaran -->
        <li class="nav-item {{ request()->routeIs('admin.daftar_ulang.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.daftar_ulang.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Pembayaran</span>
            </a>
        </li>

        <!-- 3. Data Pendaftar -->
        <li class="nav-item {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.siswa.index') }}">
                <i class="fas fa-user-graduate"></i>
                <span>Data Pendaftar</span>
            </a>
        </li>

        <!-- 4. Seleksi Tes Quran -->
        <li class="nav-item {{ request()->routeIs('admin.quran.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.quran.index') }}">
                <i class="fas fa-book-open"></i>
                <span>Seleksi Tes Quran</span>
            </a>
        </li>

        <!-- 5. Seleksi Wawancara -->
        <li class="nav-item {{ request()->routeIs('admin.interview.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.interview.index') }}">
                <i class="fas fa-comments"></i>
                <span>Seleksi Wawancara</span>
            </a>
        </li>

        <!-- 6. Data Hasil Akhir -->
        <li class="nav-item {{ request()->routeIs('admin.hasil_akhir.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.hasil_akhir.index') }}">
                <i class="far fa-file-excel"></i>
                <span>Data Hasil Akhir</span>
            </a>
        </li>

        <!-- 7. Data Rekapan -->
        <li class="nav-item {{ request()->routeIs('admin.rekapan.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.rekapan.index') }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Data Rekapan</span>
            </a>
        </li>

        <!-- 8. Jadwal Pendaftaran -->
        <li class="nav-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Jadwal Pendaftaran</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- 9. User Profil -->
        <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <i class="fas fa-user-gear"></i>
                <span>User Profil</span>
            </a>
        </li>

    @else

        <hr class="sidebar-divider">

        <!-- Info Jurusan Dan Kuota -->
        <li class="nav-item {{ request()->routeIs('siswa.kelas.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.kelas.index') }}">
                <i class="fas fa-house-flag"></i>
                <span>Info Jurusan Dan Kuota</span>
            </a>
        </li>

        <!-- Pembayaran -->
        <li class="nav-item {{ request()->routeIs('siswa.daftar_ulang.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.daftar_ulang.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Pembayaran</span>
            </a>
        </li>

        <!-- Pendaftaran -->
        @if (auth()->user()->daftar_ulang && auth()->user()->daftar_ulang->persetujuan == 'disetujui')
            <li class="nav-item {{ request()->routeIs('siswa.pendaftaran.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.pendaftaran.index') }}">
                    <i class="fas fa-tablet"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
        @endif

        <!-- Upload Berkas -->
        <li class="nav-item {{ request()->routeIs('siswa.dokumen.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.dokumen.index') }}">
                <i class="fas fa-upload"></i>
                <span>Upload Berkas</span>
            </a>
        </li>

        <!-- Seleksi Tes Quran -->
        <li class="nav-item {{ request()->routeIs('siswa.tes.quran.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.tes.quran.index') }}">
                <i class="fas fa-book-open"></i>
                <span>Seleksi Tes Quran</span>
            </a>
        </li>

        <!-- Seleksi Wawancara -->
        @if (auth()->user()->quranTest && auth()->user()->quranTest->score !== null)
            <li class="nav-item {{ request()->routeIs('siswa.interview.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.interview.index') }}">
                    <i class="fas fa-comments"></i>
                    <span>Seleksi Wawancara</span>
                </a>
            </li>
        @endif

        <!-- Pengumuman -->
        @if (Route::has('pengumuman.index'))
            <li class="nav-item {{ request()->routeIs('pengumuman.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengumuman.index') }}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Pengumuman</span>
                </a>
            </li>
        @endif

    @endif

</ul>
<!-- End of Sidebar -->