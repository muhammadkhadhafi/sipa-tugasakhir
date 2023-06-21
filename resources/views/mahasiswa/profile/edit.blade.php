@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  <form action="/mahasiswa/profile/{{ auth()->user()->id }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-lg-3">
        <img src="/assets/img/default-person.jpg" alt="{{ auth()->user()->nama }}" class="img-fluid" style="width: 100%">
        <input type="file" accept=".jpg, .png" value="foto" name="foto" id="foto" class="form-control"
          style="border-radius: 0;">
      </div>
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Mahasiswa</h6>
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save fa-sm"></i> Simpan</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="nim" name="nim"
                    value="{{ auth()->user()->nim }}" readonly>
                </div>
              </div>
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
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama"
                    value="{{ auth()->user()->nama }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="prodi" class="form-label">Program Studi</label>
                  <input type="text" class="form-control" id="prodi" name="prodi"
                    value="{{ auth()->user()->prodi->program }} {{ auth()->user()->prodi->nama }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                    value="{{ auth()->user()->jenisKelaminString }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="agama" class="form-label">Agama</label>
                  <input type="text" class="form-control" id="agama" name="agama"
                    value="{{ auth()->user()->agamaString }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" id="tempat_lahir"
                    value="{{ auth()->user()->tempat_lahir }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date"" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ auth()->user()->tanggal_lahir }}" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
