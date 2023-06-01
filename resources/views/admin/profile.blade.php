@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Profile</h1>

  <div class="row">
    <div class="col-lg-3">
      <img src="/assets/img/default-person.jpg" class="img-fluid" style="width: 100%">
    </div>
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Pegawai</h6>
          <a href="/admin/master-data/pegawai/{{ auth()->user()->id }}/edit" class="btn btn-sm btn-warning"><i
              class="fas fa-pencil-alt"></i> Edit</a>
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
        </div>
      </div>
    </div>
  </div>
@endsection
