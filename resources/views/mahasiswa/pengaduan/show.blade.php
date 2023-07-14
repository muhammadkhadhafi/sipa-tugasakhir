@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengaduan</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <dl>
            <dt>Judul Pengaduan</dt>
            <dd>{{ $pengaduan->judul_pengaduan }}</dd>
            <dt>Pelapor</dt>
            <dd>{{ $pengaduan->mahasiswa->nama }}</dd>
            <dt>Waktu Pengaduan</dt>
            <dd>{{ $pengaduan->waktu_pengaduan_string }}</dd>
            <dt>Status Pengaduan</dt>
            <dd>
              @if ($pengaduan->status == 1)
                <span class="badge badge-secondary p-1">Pengaduan baru</span>
              @elseif($pengaduan->status == 2)
                <span class="badge badge-success p-1">Pengaduan selesai</span>
              @elseif($pengaduan->status == 3)
                <span class="badge badge-danger p-1">Pengaduan ditolak</span>
              @endif
            </dd>
            <dt>File Bukti Pengaduan</dt>
            <dd>
              @if ($pengaduan->bukti->count() > 0)
                <ol>
                  @foreach ($pengaduan->bukti as $bukti)
                    <li class="mt-1">
                      <a href="" target="popup"
                        onclick="window.open('{{ asset('storage/' . $bukti->file_bukti) }}','popup','width=800,height=600'); return false;"
                        class="btn btn-sm btn-primary c-btn"><i class="far fa-eye fa-sm"></i> Preview</a>
                      {{ $bukti->nama_bukti }}
                    </li>
                  @endforeach
                </ol>
              @elseif($pengaduan->bukti)
                <ol>
                  <li>
                    Tidak/belum ada bukti
                  </li>
                </ol>
              @endif
            </dd>
            <dt>Deskripsi Pengaduan</dt>
            <dd>{!! $pengaduan->deskripsi_pengaduan !!}</dd>
            <dt>Deskripsi Tindak Lanjut</dt>
            @if ($pengaduan->deskripsi_tindak_lanjut)
              <dd>{!! $pengaduan->deskripsi_tindak_lanjut !!}</dd>
            @else
              <dd>Belum ada tindak lanjut</dd>
            @endif
          </dl>
        </div>
      </div>
    </div>
  </div>
@endsection
