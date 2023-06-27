@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Profile</h1>

  @include('layouts.utils.notif')

  <div class="row">
    <div class="col-lg-3">
      @if (auth()->user()->foto)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-fluid" style="width: 100%">
      @else
        <img src="/assets/img/default-person.jpg" class="img-fluid" style="width: 100%">
      @endif
    </div>
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Pegawai</h6>
          <a href="/admin/profile/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt fa-sm"></i> Edit</a>
        </div>
        <div class="card-body">
          <div class="row mb-1">
            <div class="col-md-4">Nama Lengkap</div>
            <div class="col-md-8">{{ auth()->user()->nama }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Username</div>
            <div class="col-md-8">{{ auth()->user()->username }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">NIP</div>
            <div class="col-md-8">{{ auth()->user()->nip }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Jenis Kelamin</div>
            <div class="col-md-8">{{ auth()->user()->jenisKelaminString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Agama</div>
            <div class="col-md-8">{{ auth()->user()->agamaString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Tempat, Tanggal Lahir</div>
            <div class="col-md-8">{{ auth()->user()->tempat_lahir }}, {{ auth()->user()->tanggal_lahir_string }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Status</div>
            <div class="col-md-8">
              @if (auth()->user()->is_masterdata)
                Master Data
              @else
                Admin
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
