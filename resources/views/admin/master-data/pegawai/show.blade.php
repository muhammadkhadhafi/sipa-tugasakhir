@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pegawai</h1>

  <div class="row">
    <div class="col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Pegawai</h6>
        </div>
        <div class="card-body">
          <dl>
            <dt>Nama</dt>
            <dd>{{ $pegawai->nama }}</dd>
            <dt>Username</dt>
            <dd>{{ $pegawai->username }}</dd>
            <dt>NIP</dt>
            <dd>{{ $pegawai->nip }}</dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
@endsection
