@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengajuan Surat Keterangan Aktif</h1>

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengajuan Surat Keterangan Aktif</h6>
      @if ($pengajuan->status == 1)
        <span class="badge badge-primary p-1">Pengajuan diproses</span>
      @elseif($pengajuan->status == 2)
        <span class="badge badge-success p-1">Pengajuan selesai</span>
      @elseif($pengajuan->status == 3)
        <span class="badge badge-primary p-1">Pengajuan ditolak</span>
      @endif
    </div>
    <div class="card-body">
      <dl>
        <dt>Pengaju</dt>
        <dd>{{ $pengajuan->mahasiswa->nama }}</dd>
        <dt>Waktu Pengajuan</dt>
        <dd>{{ $pengajuan->waktu_pengajuan_string }}</dd>
        <dt>Deskripsi</dt>
        <dd>{{ $pengajuan->deskripsi }}</dd>
      </dl>
      @if ($pengajuan->surat_keterangan_aktif)
        <hr>
        <a href="#" class="btn btn-sm btn-primary d-block py-2 c-btn"><i class="fas fa-download"></i> Download Surat
          Keterangan
          Aktif</a>
      @endif
    </div>
  </div>
@endsection
