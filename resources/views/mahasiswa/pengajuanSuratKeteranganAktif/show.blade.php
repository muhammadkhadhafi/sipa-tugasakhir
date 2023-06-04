@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">
    Pengajuan Surat Keterangan Aktif</h1>

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengajuan Surat Keterangan Aktif</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <dl>
            <dt>Pengaju</dt>
            <dd>{{ $pengajuan->mahasiswa->nama }}</dd>
            <dt>Waktu Pengajuan</dt>
            <dd>{{ $pengajuan->waktu_pengajuan_string }}</dd>
            <dt>Status Pengajuan</dt>
            <dd>
              @if ($pengajuan->status == 1)
                <span class="badge badge-primary p-1">Pengajuan diproses</span>
              @elseif($pengajuan->status == 2)
                <span class="badge badge-success p-1">Pengajuan selesai</span>
              @elseif($pengajuan->status == 3)
                <span class="badge badge-danger p-1">Pengajuan ditolak</span>
              @endif
            </dd>
            <dt>Deskripsi Pengajuan</dt>
            <dd>{!! $pengajuan->deskripsi_pengajuan !!}</dd>
            @if ($pengajuan->deskripsi_pengajuan_ditolak)
              <dt>Deskripsi Pengajuan Ditolak</dt>
              <dd>{!! $pengajuan->deskripsi_pengajuan_ditolak !!}</dd>
            @endif
          </dl>
        </div>
      </div>

      @if ($pengajuan->surat_keterangan_aktif)
        <hr>
        <div class="row">
          <div class="col-lg-12">
            <a href="" target="popup"
              onclick="window.open('{{ asset('storage/' . $pengajuan->surat_keterangan_aktif) }}','popup','width=800,height=600'); return false;"
              class="btn btn-sm btn-primary d-block py-2 c-btn"><i class="fas fa-file"></i> Surat Keterangan Aktif</a>
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection
