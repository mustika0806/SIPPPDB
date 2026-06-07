<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: linear-gradient(180deg, #0f9d58 0%, #0b6e3f 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ url('sekolah3-bg.png') }}" alt="logo" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">SIPPDB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @if (auth()->user()->level == 'admin')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.kelas.index') }}">
                <i class="fas fa-house-flag"></i>
                <span>Jurusan Dan Kuota</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
                <i class="fas fa-user"></i>
                <span>Jadwal Pendaftaran</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.siswa.index') }}">
                <i class="fas fa-user-graduate"></i>
                <span>Data Pendaftar</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.daftar_ulang.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.daftar_ulang.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Pembayaran</span>
            </a>
        </li>
        <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-folder-open"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.kriteria.index') }}">Data Kriteria</a>
                        <a class="collapse-item" href="{{ route('admin.aspek.index') }}">Data Aspek</a>
                        <a class="collapse-item" href="{{ route('admin.penilaian.index') }}">Data Penilaian</a>
                    </div>
                </div>
            </li> -->
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item {{ request()->routeIs('admin.perhitungan.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.perhitungan.index') }}">
                    <i class="fas fa-calculator"></i>
                    <span>Data Perhitungan</span>
                </a>
            </li> -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.hasil_akhir.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.hasil_akhir.index') }}">
                <i class="far fa-file-excel"></i>
                <span>Data Hasil Akhir</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.rekap.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.rekap.index') }}">
                <i class="fas fa-file-contract"></i>
                <span>Data Rekapan</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <i class="fas fa-user-gear"></i>
                <span>User Profil</span>
            </a>
        </li>
    @else
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        @if (auth()->user()->daftar_ulang && auth()->user()->daftar_ulang->persetujuan == 'disetujui')
            <li class="nav-item {{ request()->routeIs('siswa.pendaftaran.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.pendaftaran.index') }}">
                    <i class="fas fa-tablet"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
        @endif
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('siswa.dokumen.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.dokumen.index') }}">
                <i class="fas fa-upload"></i>
                <span>Upload Berkas</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('siswa.siswa.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.siswa.index') }}">
                <i class="fas fa-user-graduate"></i>
                <span>Data Pendaftar</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('siswa.kelas.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswa.kelas.index') }}">
                <i class="fas fa-house-flag"></i>
                <span>Info Jurusan Dan Kuota</span>
            </a>
        </li>
        @if (auth()->user()->level == 'siswa')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->routeIs('siswa.daftar_ulang.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.daftar_ulang.index') }}">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Pembayaran</span>
                </a>
            </li>
        @endif
    @endif
</ul>
<!-- End of Sidebar -->