<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600">{{ auth()->user()->nama }}</span>
        {{-- <img class="img-profile rounded-circle" src="/template/img/undraw_profile.svg"> --}}
        @if (auth()->user()->foto)
          <img class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->foto) }}">
        @else
          <img class="img-profile rounded-circle" src="{{ url('/assets/img/default-person.jpg') }}">
        @endif
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="/admin/profile">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <div class="dropdown-divider"></div>
        <form action="/logout" method="get">
          @csrf
          <button type="submit" class="dropdown-item"><i
              class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</button>
        </form>
      </div>
    </li>

  </ul>

</nav>
