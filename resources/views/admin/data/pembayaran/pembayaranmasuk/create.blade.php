@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Kategori Pembayaran</h6>
    </div>
    <div class="card-body">
      <form action="{{ url('admin/pembayaran/kategoripembayaran') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="kategori_pembayaran" class="form-label">Kategori Pembayaran</label>
              <input type="text" name="kategori_pembayaran" id="kategori_pembayaran"
                class="form-control @error('kategori_pembayaran') is-invalid @enderror"
                value="{{ old('kategori_pembayaran') }}">
              @error('kategori_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" name="harga" id="harga"
                class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
              @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save fa-sm"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
