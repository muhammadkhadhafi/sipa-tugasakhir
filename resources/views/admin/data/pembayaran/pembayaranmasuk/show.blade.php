@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  <div class="card shadow m-0 p-0 col-lg-5">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pembayaran</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <dl>
            <dt>Nama</dt>
            <dd>{{ $pembayaran->mahasiswa->nama }}</dd>
            <dt>NIM</dt>
            <dd>{{ $pembayaran->mahasiswa->nim }}</dd>
            <dt>Program Studi</dt>
            <dd>{{ $pembayaran->mahasiswa->program_studi }}</dd>
            <dt>Kategori Pembayaran</dt>
            <dd>{{ $pembayaran->kategoriPembayaran->kategori_pembayaran }}</dd>
            <dt>Total Harga</dt>
            <dd>@rupiah($pembayaran->kategoriPembayaran->harga)</dd>
            <dt>Waktu Checkout</dt>
            <dd>{{ $pembayaran->waktu_ditambahkan_string }}</dd>
            <dt>Status pembayaran</dt>
            <dd>
              @if ($pembayaran->status == 'Unpaid')
                <span class="badge badge-secondary p-1">Unpaid</span>
              @elseif($pembayaran->status == 'Paid')
                <span class="badge badge-success p-1">Paid</span>
              @endif
            </dd>
        </div>
      </div>
    </div>
  </div>
@endsection
