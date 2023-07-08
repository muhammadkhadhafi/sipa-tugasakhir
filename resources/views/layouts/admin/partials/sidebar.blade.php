<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIPA</div>
  </a>

  <!-- Heading -->
  <div class="sidebar-heading text-center">
    Admin
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider mb-0 mt-1">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="/admin/dashboard">
      <i class="fas fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::is('admin/suratketeranganaktif*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSuratKeteranganAktif"
      aria-expanded="true" aria-controls="collapseSuratKeteranganAktif">
      <i class="fas fa-file"></i>
      <span>Surat Keterangan Aktif</span>
    </a>
    <div id="collapseSuratKeteranganAktif"
      class="collapse {{ Request::is('admin/suratketeranganaktif*') ? 'show' : '' }}" aria-labelledby="headingPages"
      data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengajuan:</h6>
        <a class="collapse-item {{ Request::is('admin/suratketeranganaktif/pengajuanbaru*') ? 'active' : '' }}"
          href="/admin/suratketeranganaktif/pengajuanbaru">Pengajuan
          Baru</a>
        <a class="collapse-item {{ Request::is('admin/suratketeranganaktif/riwayatpengajuan*') ? 'active' : '' }}"
          href="/admin/suratketeranganaktif/riwayatpengajuan">Riwayat Pengajuan</a>
        <a class="collapse-item {{ Request::is('admin/suratketeranganaktif/catatan*') ? 'active' : '' }}"
          href="/admin/suratketeranganaktif/catatan">Catatan</a>
      </div>
    </div>
  </li>

  <li class="nav-item {{ Request::is('admin/pkkmb*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePkkmb" aria-expanded="true"
      aria-controls="collapsePkkmb">
      <i class="fas fa-school"></i>
      <span>PKKMB</span>
    </a>
    <div id="collapsePkkmb" class="collapse {{ Request::is('admin/pkkmb*') ? 'show' : '' }}"
      aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">PKKMB:</h6>
        <a class="collapse-item {{ Request::is('admin/pkkmb/absen*') ? 'active' : '' }}"
          href="/admin/pkkmb/absen">Absensi</a>
      </div>
    </div>
  </li>

  <li class="nav-item {{ Request::is('admin/wisuda*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseWisuda" aria-expanded="true"
      aria-controls="collapseWisuda">
      <i class="fas fa-graduation-cap"></i>
      <span>Wisuda</span>
    </a>
    <div id="collapseWisuda" class="collapse {{ Request::is('admin/wisuda*') ? 'show' : '' }}"
      aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Wisuda:</h6>
        <a class="collapse-item {{ Request::is('admin/wisuda/pendaftaran*') ? 'active' : '' }}"
          href="/admin/wisuda/pendaftaran">Pendaftaran</a>
        <a class="collapse-item {{ Request::is('admin/wisuda/tahunwisuda*') ? 'active' : '' }}"
          href="/admin/wisuda/tahunwisuda">Wisuda Tahun</a>
        <a class="collapse-item {{ Request::is('admin/wisuda/harga*') ? 'active' : '' }}"
          href="/admin/wisuda/harga">Atur Harga Pendaftaran</a>
      </div>
    </div>
  </li>

  <li class="nav-item {{ Request::is('admin/pengaduan*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePengaduan" aria-expanded="true"
      aria-controls="collapsePengaduan">
      <i class="fas fa-bullhorn"></i>
      <span>Pengaduan</span>
    </a>
    <div id="collapsePengaduan" class="collapse {{ Request::is('admin/pengaduan*') ? 'show' : '' }}"
      aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaduan:</h6>
        <a class="collapse-item {{ Request::is('admin/pengaduan/pengaduanbaru*') ? 'active' : '' }}"
          href="/admin/pengaduan/pengaduanbaru">Pengaduan
          Baru</a>
        <a class="collapse-item {{ Request::is('admin/pengaduan/riwayatpengaduan*') ? 'active' : '' }}"
          href="/admin/pengaduan/riwayatpengaduan">Riwayat Pengaduan</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  @can('masterdata')
    <!-- Heading -->
    <div class="sidebar-heading">
      Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/master-data*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
        <span>Users</span>
      </a>
      <div id="collapseTwo" class="collapse {{ Request::is('admin/master-data*') ? 'show' : '' }}"
        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Users:</h6>
          <a class="collapse-item {{ Request::is('admin/master-data/mahasiswa*') ? 'active' : '' }}"
            href="/admin/master-data/mahasiswa">Mahasiswa</a>
          <a class="collapse-item {{ Request::is('admin/master-data/pegawai*') ? 'active' : '' }}"
            href="/admin/master-data/pegawai">Pegawai</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
  @endcan


  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
