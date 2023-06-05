@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pengaduan</h6>
    </div>
    <div class="card-body">
      <form action="/mahasiswa/pengaduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
              <input type="text" name="judul_pengaduan" id="judul_pengaduan"
                class="form-control @error('judul_pengaduan') is-invalid @enderror">
              @error('judul_penguduan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="deskripsi_pengaduan" class="form-label">Deskripsi Pengaduan</label>
              @error('deskripsi_pengaduan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="deskripsi_pengaduan" type="hidden" name="deskripsi_pengaduan">
              <trix-editor input="deskripsi_pengaduan">Deskripsikan pengaduan anda dalam kalimat yang singkat dan jelas.
              </trix-editor>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="" class="form-label">File Bukti Pengaduan</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" name="nama_bukti_pengaduan" id="nama_bukti_pengaduan" class="form-control"
                    placeholder="Nama bukti">
                </div>
                <div class="col-lg-6">
                  <input type="file" name="file_bukti_pengaduan" id="file_bukti_pengaduan" class="form-control">
                </div>
              </div>
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
