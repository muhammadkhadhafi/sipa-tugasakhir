@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">
    Pengajuan Surat Keterangan Aktif</h1>

  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengajuan Surat Keterangan Aktif</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <dl>
                <dt>Pengaju</dt>
                <dd>{{ $pengajuan->mahasiswa->nama }}</dd>
                <dt>Semester</dt>
                @if ($pengajuan->semester == 1)
                  <dd>I (Satu)</dd>
                @elseif ($pengajuan->semester == 2)
                  <dd>II (Dua)</dd>
                @elseif ($pengajuan->semester == 3)
                  <dd>III (Tiga)</dd>
                @elseif ($pengajuan->semester == 4)
                  <dd>IV (Empat)</dd>
                @elseif ($pengajuan->semester == 5)
                  <dd>V (Lima)</dd>
                @elseif ($pengajuan->semester == 6)
                  <dd>VI (Enam)</dd>
                @elseif ($pengajuan->semester == 7)
                  <dd>VII (Tujuh)</dd>
                @elseif ($pengajuan->semester == 8)
                  <dd>VIII (Delapang)</dd>
                @endif
                <dt>No Hp</dt>
                <dd>{{ $pengajuan->no_hp }}</dd>
                <dt>Nama Orang Tua</dt>
                <dd>{{ $pengajuan->nama_orang_tua }}</dd>
                <dt>Pekerjaan Orang Tua</dt>
                <dd>{{ $pengajuan->pekerjaan_orang_tua }}</dd>
                <dt>Tanggal Pengajuan</dt>
                <dd>{{ $pengajuan->tanggal_pengajuan_string }}</dd>
                <dt>Status Pengajuan</dt>
                <dd>
                  @if ($pengajuan->status == 1)
                    <span class="badge badge-secondary p-1">Pengajuan baru</span>
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
                  class="btn btn-sm btn-primary d-block py-2 c-btn"><i class="fas fa-file fa-sm"></i> Surat Keterangan
                  Aktif</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card shadow m-0">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Catatan</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if ($pengajuan->status == 1)
                <p>Segera konfirmasi ke: <br><strong>{{ $kontak_admin }}</strong></p>
              @else
                <p>Tidak ada catatan</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
