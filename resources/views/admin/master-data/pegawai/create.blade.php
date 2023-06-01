@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pegawai</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pegawai</h6>
    </div>
    <div class="card-body">
      <form action="/admin/master-data/pegawai" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                autofocus value="{{ old('nama') }}">
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                name="username" value="{{ old('username') }}">
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
              <input type="number"" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                value="{{ old('nip') }}">
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
                @if (old('jenis_kelamin'))
                  <option selected value="{{ old('jenis_kelamin') }}">{{ old('jenis_kelamin') }}</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                @else
                  <option disabled selected>Open this select menu</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                @endif
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
                @if (old('agama'))
                  <option value="{{ old('agama') }}" selected>{{ old('agama') }}</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katholik">Katholik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Kong Hu Chu">Kong Hu Chu</option>
                @else
                  <option selected disabled>Open this select menu</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katholik">Katholik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Kong Hu Chu">Kong Hu Chu</option>
                @endif
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
                value="{{ old('tempat_lahir') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date"" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
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
                @if (old('is_masterdata'))
                  <option value="{{ old('is_masterdata') }}" selected>Master Data</option>
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
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                name="foto">
              @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
