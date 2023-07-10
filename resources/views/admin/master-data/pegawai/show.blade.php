@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pegawai</h1>

  <div class="row">
    <div class="col-lg-3">
      @if ($pegawai->foto)
        <img src="{{ asset('storage/' . $pegawai->foto) }}" class="img-fluid" style="width: 100%" alt="{{ $pegawai->nama }}">
      @else
        <img src="{{ url('/assets/img/default-person.jpg') }}" class="img-fluid" style="width: 100%"
          alt="{{ $pegawai->nama }}">
      @endif
    </div>
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Pegawai</h6>
          <a href="/admin/master-data/pegawai/{{ $pegawai->id }}/edit" class="btn btn-sm btn-primary"><i
              class="fas fa-pencil-alt fa-sm"></i> Edit</a>
        </div>
        <div class="card-body">
          <div class="row mb-1">
            <div class="col-md-4">Nama Lengkap</div>
            <div class="col-md-8">{{ $pegawai->nama }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Username</div>
            <div class="col-md-8">{{ $pegawai->username }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">NIP</div>
            <div class="col-md-8">{{ $pegawai->nip }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Jenis Kelamin</div>
            <div class="col-md-8">{{ $pegawai->jenisKelaminString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Agama</div>
            <div class="col-md-8">{{ $pegawai->agamaString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Tempat, Tanggal Lahir</div>
            <div class="col-md-8">{{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir_string }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Status</div>
            <div class="col-md-8">
              @if ($pegawai->is_masterdata)
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
