@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Kategori Pembayaran</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <dl>
            <dt>Kategori Pembayaran</dt>
            <dd>{{ $kategori->kategori_pembayaran }}</dd>
            <dt>Harga</dt>
            <dd>@rupiah($kategori->harga)</dd>
            <dt>Waktu Kategori Pembayaran Ditambahkan</dt>
            <dd>{{ $kategori->waktu_ditambahkan_string }}</dd>
        </div>
      </div>
    </div>
  </div>
@endsection
