<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Makmur Jaya</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('penduduk') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penduduk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>User</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('sasaran') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Sasaran Bantuan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('jenisbantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Jenis Bantuan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('bantuan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Bantuan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('penyuluhan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penyuluhan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('dilaksanakan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan Hadir</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('tidak_dilaksanakan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan Tidak Hadir</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Penjualan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Penjualan Components:</h6>
            <a class="collapse-item" href="{{url('penjualan')}}">Master</a>
            <a class="collapse-item" href="#">Sub Master</a>
            </div>
        </div>
        </li> --}}
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->