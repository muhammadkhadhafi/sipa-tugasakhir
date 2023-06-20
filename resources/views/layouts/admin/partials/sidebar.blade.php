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
  <li class="nav-item {{ Request::is('admin/pengajuansuratketeranganaktif*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePengajuanSuratKeteranganAktif"
      aria-expanded="true" aria-controls="collapsePengajuanSuratKeteranganAktif">
      <i class="fas fa-file"></i>
      <span>Surat Keterangan Aktif</span>
    </a>
    <div id="collapsePengajuanSuratKeteranganAktif"
      class="collapse {{ Request::is('admin/pengajuansuratketeranganaktif*') ? 'show' : '' }}"
      aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengajuan:</h6>
        <a class="collapse-item {{ Request::is('admin/pengajuansuratketeranganaktif/pengajuanbaru*') ? 'active' : '' }}"
          href="/admin/pengajuansuratketeranganaktif/pengajuanbaru">Pengajuan
          Baru</a>
        <a class="collapse-item {{ Request::is('admin/pengajuansuratketeranganaktif/pengajuanselesai*') ? 'active' : '' }}"
          href="/admin/pengajuansuratketeranganaktif/pengajuanselesai">Pengajuan Selesai</a>
        <a class="collapse-item {{ Request::is('admin/pengajuansuratketeranganaktif/catatan*') ? 'active' : '' }}"
          href="/admin/pengajuansuratketeranganaktif/catatanditampilkan">Catatan Ditampilkan</a>
      </div>
    </div>
  </li>

  <li class="nav-item {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePembayaran" aria-expanded="true"
      aria-controls="collapsePembayaran">
      <i class="fas fa-credit-card"></i>
      <span>Pembayaran</span>
    </a>
    <div id="collapsePembayaran" class="collapse {{ Request::is('admin/pembayaran*') ? 'show' : '' }}"
      aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pembayaran:</h6>
        <a class="collapse-item {{ Request::is('admin/pembayaran/pembayaranmasuk*') ? 'active' : '' }}"
          href="/admin/pembayaran/pembayaranmasuk">Pembayaran Masuk</a>
        <a class="collapse-item {{ Request::is('admin/pembayaran/kategoripembayaran*') ? 'active' : '' }}"
          href="/admin/pembayaran/kategoripembayaran">Kategori Pembayaran</a>
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
        <a class="collapse-item {{ Request::is('admin/pengaduan/pengaduanselesai*') ? 'active' : '' }}"
          href="/admin/pengaduan/pengaduanselesai">Pengaduan Selesai</a>
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
