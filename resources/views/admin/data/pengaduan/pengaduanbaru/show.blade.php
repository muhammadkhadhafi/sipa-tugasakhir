@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengaduan</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <dl>
            <dt>Pelapor</dt>
            <dd>{{ $pengaduan->mahasiswa->nama }}</dd>
            <dt>NIM</dt>
            <dd>{{ $pengaduan->mahasiswa->nim }}</dd>
            <dt>Program Studi</dt>
            <dd>{{ $pengaduan->mahasiswa->program_studi }}</dd>
            <dt>Judul Pengaduan</dt>
            <dd>{{ $pengaduan->judul_pengaduan }}</dd>
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
              @if ($pengaduan->file_bukti_pengaduan)
                <a href="" target="popup"
                  onclick="window.open('{{ asset('storage/' . $pengaduan->file_bukti_pengaduan) }}','popup','width=800,height=600'); return false;"
                  class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye"></i> Lihat</a>
              @else
                Tidak/belum ada bukti
              @endif
            </dd>
            <dt>Deskripsi Pengaduan</dt>
            <dd>{!! $pengaduan->deskripsi_pengaduan !!}</dd>
          </dl>
        </div>
      </div>
      <hr>
      <form action="/admin/pengaduan/pengaduanbaru/deskripsitindaklanjut/{{ $pengaduan->id }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="deskripsi_tindak_lanjut">Deskripsi Tindak Lanjut</label>
              <input type="hidden" name="deskripsi_tindak_lanjut" id="deskripsi_tindak_lanjut">
              <trix-editor input="deskripsi_tindak_lanjut">Deskripsikan tindak lanjut dari pengaduan ini dalam kalimat
                yang
                singkat dan jelas.</trix-editor>
              @error('deskripsi_tindak_lanjut')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
