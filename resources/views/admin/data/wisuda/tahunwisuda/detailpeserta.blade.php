@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">
    Wisuda</h1>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Peserta Wisuda Tahun {{ $tahun_wisuda }}</h6>
          @if (!$peserta->pembayaran)
            <form action="{{ url('/admin/wisuda/tahunwisuda/peserta/batalverifikasi/' . $peserta->id) }}" method="post"
              onsubmit="return confirm('Yakin ingin membatalkan verifikasi?')">
              @csrf
              @method('put')
              <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-times-circle fa-sm"></i> Batal
                Verifikasi</button>
            </form>
          @endif
        </div>
        <div class="card-body">
          <dl>
            <div class="row">
              <div class="col-lg-6">
                <dt>Nama</dt>
                <dd>{{ $peserta->mahasiswa->nama }}</dd>
                <dt>NIM</dt>
                <dd>{{ $peserta->mahasiswa->nim }}</dd>
                <dt>Angkatan</dt>
                <dd>{{ $peserta->mahasiswa->angkatan }}</dd>
                <dt>Program Studi</dt>
                <dd>{{ $peserta->mahasiswa->prodi->nama }}</dd>
                <dt>Jurusan</dt>
                <dd>{{ $peserta->mahasiswa->prodi->jurusan->nama }}</dd>
                <dt>Waktu Pendaftaran</dt>
                <dd>{{ $peserta->waktuPendaftaranString }}</dd>
                <dt>Berkas Pendaftaran Wisuda</dt>
                <dd>
                  <a href="" target="popup"
                    onclick="window.open('{{ asset('storage/' . $peserta->berkas_pendaftaran_wisuda) }}','popup','width=800,height=600'); return false;"
                    class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye fa-sm"></i> Preview</a>
                </dd>
              </div>
              <div class="col-lg-6">
                @if ($peserta->pembayaran)
                  <dt>Status Pembayaran</dt>
                  <dd>{!! $peserta->pembayaran->statusPembayaranString !!}</dd>
                  <dt>Waktu Checkout</dt>
                  <dd>{{ $peserta->pembayaran->waktuPembayaranString }}</dd>
                  <dt>Waktu Dibayar</dt>
                  @if ($peserta->pembayaran->waktu_dibayar)
                    <dd>{{ $peserta->pembayaran->waktuDibayarString }}</dd>
                  @else
                    <dd>-</dd>
                  @endif
                  <dt>Harga</dt>
                  <dd>@rupiah($peserta->pembayaran->harga)</dd>
                @else
                  <dt>Status Pembayaran</dt>
                  <dd><span class="badge badge-secondary p-1">Belum melakukan pembayaran</span></dd>
                  <dt>Waktu Checkout</dt>
                  <dd>-</dd>
                  <dt>Waktu Dibayar</dt>
                  <dd>-</dd>
                  <dt>Harga</dt>
                  <dd>-</dd>
                @endif
              </div>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
@endsection
