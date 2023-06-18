@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Mahasiswa</h6>
    </div>
    <div class="card-body">
      <form action="/admin/master-data/mahasiswa" method="post">
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
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                value="{{ old('nim') }}">
              @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="program_studi" class="form-label">Program Studi</label>
              <select class="custom-select @error('program_studi') is-invalid @enderror" name="program_studi"
                id="program_studi">
                <option selected disabled>Open this select menu</option>
                <option value="Pemeliharaan Mesin">Pemeliharaan Mesin</option>
                <option value="Teknologi Pertambangan">Teknologi Pertambangan</option>
                <option value="Teknologi Hasil Perkebunan">Teknologi Hasil Perkebunan</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Agroindustri">Agroindustri</option>
                <option value="Teknologi Listrik">Teknologi Listrik</option>
                <option value="Teknologi Rekayasa Konstruksi Jalan dan Jembatan">Teknologi Rekayasa
                  Konstruksi Jalan dan Jembatan</option>
                <option value="Teknologi Produksi Tanaman Perkebunan">Teknologi Produksi Tanaman
                  Perkebunan</option>
              </select>
              @error('program_studi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select class="custom-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                id="jenis_kelamin">
                <option selected disabled>Open this select menu</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
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
                <option selected disabled>Open this select menu</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Kong Hu Chu">Kong Hu Chu</option>
              </select>
              @error('agama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                id="tempat_lahir" name="tempat_lahir">
              @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                id="tanggal_lahir">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                id="password">
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
