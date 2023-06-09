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
      <span>Surat Keterangan Aktif</span></a>
  </li>

  <li class="nav-item {{ Request::is('mahasiswa/pkkmb/absen*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pkkmb/absen">
      <i class="fas fa-school"></i>
      <span>PKKMB</span></a>
  </li>

  @can('is_koor_pkkmb')
    <li class="nav-item {{ Request::is('mahasiswa/pkkmb/koor*') ? 'active' : '' }}">
      <a class="nav-link" href="/mahasiswa/pkkmb/koor">
        <i class="fas fa-tasks"></i>
        <span>Koordinator PKKMB</span></a>
    </li>
  @endcan

  <li class="nav-item {{ Request::is('mahasiswa/pendaftaranwisuda*') ? 'active' : '' }}">
    <a class="nav-link" href="/mahasiswa/pendaftaranwisuda">
      <i class="fas fa-graduation-cap"></i>
      <span>Pendaftaran Wisuda</span></a>
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
