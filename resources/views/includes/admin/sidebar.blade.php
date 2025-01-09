<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header text-start mb-3">
            <a class="navbar-brand d-flex justify-content-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" class="mr-3" style="max-height: 60px;">
                <div class="text-start">
                    <h1 class="text-primary mb-0" style="font-size: 20px; font-weight: bold;">
                        <i>{{ auth('admin')->user()->nama_petugas ?? 'Guest' }}</i>
                    </h1>
                    <p class="text-default mb-0" style="font-size: 0.875rem;">{{ auth('admin')->user()->jabatan ?? 'Unknown' }}</p>
                </div>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-tv text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-with-child">
                        <a class="nav-link {{ (request()->segment(2) == 'pengaduan') ? 'active' : '' }}" href="#">
                            <i class="fas fa-bullhorn text-orange"></i> Pengaduan
                            <i class="text-right fas fa-chevron-down"></i>
                        </a>
                        <ul class="nav-item-child">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->segment(2) == 'pengaduan/0') ? 'active' : '' }}" href="{{ route('pengaduan.index', '0') }}">
                                    <i class="fas fa-clipboard-check text-info"></i> Verifikasi & Validasi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengaduan.index', 'proses') }}">
                                    <i class="fas fa-sync text-yellow"></i> Sedang Diproses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengaduan.index', 'selesai') }}">
                                    <i class="fas fa-check text-success"></i> Selesai
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if( Auth::guard('admin')->user()->roles == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('laporan.index') }}">
                                <i class="fas fa-file-alt text-green"></i>
                                <span class="nav-link-text">Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('masyarakat.index') }}">
                                <i class="fas fa-users text-default"></i>
                                <span class="nav-link-text">Masyarakat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('petugas.index') }}">
                                <i class="fas fa-users-cog text-info"></i>
                                <span class="nav-link-text">Petugas</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
