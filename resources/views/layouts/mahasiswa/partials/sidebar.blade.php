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

  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/pengajuansuratketeranganaktif*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengajuansuratketeranganaktif">
      <i class="fas fa-home"></i>
      <span>Pengajuan Surat Keterangan Aktif</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/pengajuanlegalisir*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengajuanlegalisir">
      <i class="fas fa-home"></i>
      <span>Pengajuan Legalisir</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/tracerstudy*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/tracerstudy">
      <i class="fas fa-home"></i>
      <span>Tracer Study</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/pengaduan*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengaduan">
      <i class="fas fa-home"></i>
      <span>Pengaduan</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/pengajuanmengikutwisuda*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pengajuanmengikutiwisuda">
      <i class="fas fa-home"></i>
      <span>Pengajuan Mengikuti Wisuda</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block my-0">

  <li class="nav-item {{ Request::is('mahasiswa/absenpkkmb*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/absenpkkmb">
      <i class="fas fa-home"></i>
      <span>Absen PKKMB</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
