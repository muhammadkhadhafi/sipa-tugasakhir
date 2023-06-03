@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengajuan Surat Keterangan Aktif</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pengajuan</h6>
    </div>
    <div class="card-body">
      <form action="/mahasiswa/pengajuansuratketeranganaktif" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Pengajuan</label>
              <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                placeholder="Deskripsikan keperluan anda mengajukan surat keterangan aktif secara singkat dan jelas" name="deskripsi">{{ old('deskripsi', $pengajuan->deskripsi) }}</textarea>
              @error('deskripsi')
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
