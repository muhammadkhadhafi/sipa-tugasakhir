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
    Mahasiswa
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider mb-0 mt-1">


  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('mahasiswa/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/dashboard">
      <i class="fas fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item {{ Request::is('mahasiswa/pengajuansuratketeranganaktif*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengajuansuratketeranganaktif">
      <i class="fas fa-file"></i>
      <span>Pengajuan Surat Keterangan Aktif</span></a>
  </li>

  <li class="nav-item {{ Request::is('mahasiswa/pembayaran*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pembayaran">
      <i class="fas fa-credit-card"></i>
      <span>Pembayaran</span></a>
  </li>

  <li class="nav-item {{ Request::is('mahasiswa/absenpkkmb*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/absenpkkmb">
      <i class="fas fa-school"></i>
      <span>Absen PKKMB</span></a>
  </li>

  <li class="nav-item {{ Request::is('mahasiswa/pengaduan*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengaduan">
      <i class="fas fa-bullhorn"></i>
      <span>Pengaduan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
