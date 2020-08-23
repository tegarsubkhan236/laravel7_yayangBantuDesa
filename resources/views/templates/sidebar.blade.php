<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sukawana</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    @if (Auth::user()->name == 'admin')
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('pekerjaan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pekerjaan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pekerjaan</span></a>
    </li>
    <li class="nav-item {{ request()->is('penduduk') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('penduduk') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penduduk</span></a>
    </li>
    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('user') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>User</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->is('sasaran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('sasaran') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Sasaran Bantuan</span></a>
    </li>
    <li class="nav-item {{ request()->is('jenisbantuan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('jenisbantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Jenis Bantuan</span></a>
    </li>
    <li class="nav-item {{ request()->is('bantuan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('bantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Bantuan</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->is('penyuluhan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('penyuluhan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penyuluhan</span></a>
    </li>
    <li class="nav-item {{ request()->is('dilaksanakan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dilaksanakan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Hadir</span></a>
    </li>
    <li class="nav-item {{ request()->is('tidak_dilaksanakan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('tidak_dilaksanakan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Tidak Hadir</span></a>
    </li>
    <li class="nav-item {{ request()->is('laporan_penyuluhan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('laporan_penyuluhan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan Penyuluhan</span></a>
    </li>
    <li class="nav-item {{ request()->is('lampiran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('lampiran') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Lampiran Penyuluhan</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    @endif

    @if (Auth::user()->name == 'Kepala Desa')
    <h4> ===Bantuan===== </h4>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('bantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Bantuan</span></a>
    </li>
    <h4> ===Penyuluhan===== </h4>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('penyuluhan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penyuluhan</span></a>
    </li>
    @endif

    @if (Auth::user()->name == 'Kadus')
    <h4> ===Bantuan===== </h4>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('bantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Bantuan</span></a>
    </li>
    <h4> ===Penyuluhan===== </h4>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('penyuluhan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penyuluhan</span></a>
    </li>
    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->