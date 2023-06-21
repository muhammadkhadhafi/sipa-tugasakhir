@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pegawai</h1>

  <form action="/admin/master-data/pegawai/{{ $pegawai->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-lg-3">
        @if ($pegawai->foto)
          <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="img-fluid"
            style="width: 100%">
        @else
          <img src="/assets/img/default-person.jpg" alt="{{ $pegawai->nama }}" class="img-fluid" style="width: 100%">
        @endif
        <input type="file" accept=".jpg, .png" name="foto" id="foto"
          class="form-control @error('foto') is-invalid @enderror" style="border-radius: 0;">
        @error('foto')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Edit Pegawai</h6>
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save fa-sm"></i> Simpan</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" value="{{ $pegawai->nama }}">
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" value="{{ $pegawai->username }}">
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nip" class="form-label">NIP</label>
                  <input type="number"" class="form-control @error('nip') is-invalid @enderror" id="nip"
                    name="nip" value="{{ $pegawai->nip }}">
                  @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="custom-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                    id="jenis_kelamin">
                    <option selected value="{{ $pegawai->jenis_kelamin }}">{{ $pegawai->jenisKelaminString }}</option>
                    <option value=1>Laki-laki</option>
                    <option value=2>Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="agama" class="form-label">Agama</label>
                  <select class="custom-select @error('agama') is-invalid @enderror" name="agama" id="agama">
                    <option value="{{ $pegawai->agama }}" selected>{{ $pegawai->agamaString }}</option>
                    <option value=1>Islam</option>
                    <option value=2>Kristen</option>
                    <option value=3>Katholik</option>
                    <option value=4>Hindu</option>
                    <option value=5>Budha</option>
                    <option value=6>Kong Hu Chu</option>
                  </select>
                  @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir"
                    class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                    value="{{ $pegawai->tempat_lahir }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date"" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                    id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}">
                  @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="is_masterdata" class="form-label">Status</label>
                  <select class="custom-select @error('is_masterdata') is-invalid @enderror" name="is_masterdata"
                    id="is_masterdata">
                    @if ($pegawai->is_masterdata)
                      <option value="{{ $pegawai->is_masterdata }}" selected>Master Data</option>
                      <option value=0>Admin</option>
                    @else
                      <option value=0 selected>Admin</option>
                      <option value=1>Master Data</option>
                    @endif
                  </select>
                  @error('is_masterdata')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Kosongkan jika tidak ingin diubah">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
