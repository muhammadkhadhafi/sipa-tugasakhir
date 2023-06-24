@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  <div class="row">
    <div class="col-lg-3">
      <img src="/assets/img/default-person.jpg" class="img-fluid" style="width: 100%">
    </div>
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Mahasiswa</h6>
          <a href="/admin/master-data/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-sm btn-warning"><i
              class="fas fa-pencil-alt fa-sm"></i> Edit</a>
        </div>
        <div class="card-body">
          <div class="row mb-1">
            <div class="col-md-4">Nama Lengkap</div>
            <div class="col-md-8">{{ $mahasiswa->nama }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">NIM</div>
            <div class="col-md-8">{{ $mahasiswa->nim }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Jenis Kelamin</div>
            <div class="col-md-8">{{ $mahasiswa->jenisKelaminString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Jurusan</div>
            <div class="col-md-8">{{ $mahasiswa->prodi->jurusan->nama }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Program Studi</div>
            <div class="col-md-8">{{ $mahasiswa->prodi->program }} {{ $mahasiswa->prodi->nama }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Agama</div>
            <div class="col-md-8">{{ $mahasiswa->agamaString }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Tempat, Tanggal Lahir</div>
            <div class="col-md-8">{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir_string }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Angkatan</div>
            <div class="col-md-8">{{ $mahasiswa->angkatan }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">NIK</div>
            <div class="col-md-8">{{ $mahasiswa->nik }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Email</div>
            <div class="col-md-8">{{ $mahasiswa->email }}</div>
          </div>
          <div class="row mb-1">
            <div class="col-md-4">Alamat</div>
            <div class="col-md-8">{{ $mahasiswa->alamat }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
