@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">
    Pengajuan Surat Keterangan Aktif</h1>

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengajuan Surat Keterangan Aktif</h6>
    </div>
    <div class="card-body">
      <dl>
        <dt>Pengaju</dt>
        <dd>{{ $pengajuan->mahasiswa->nama }}</dd>
        <dt>NIM</dt>
        <dd>{{ $pengajuan->mahasiswa->nim }}</dd>
        <dt>Program Studi</dt>
        <dd>{{ $pengajuan->mahasiswa->program_studi }}</dd>
        <dt>Waktu Pengajuan</dt>
        <dd>{{ $pengajuan->waktu_pengajuan_string }}</dd>
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
      </dl>
      <hr>

      <div class="row">
        <div class="col-lg-12">
          <form action="/admin/pengajuansuratketeranganaktif/pengajuanbaru/uploadsurat/{{ $pengajuan->id }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="surat_keterangan_aktif" class="form-label">Upload Surat Keterangan Aktif</label>
              <input type="file" name="surat_keterangan_aktif" id="surat_keterangan_aktif"
                class="form-control @error('surat_keterangan_aktif') is-invalid @enderror" accept=".pdf">
              @error('surat_keterangan_aktif')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <form action="/admin/pengajuansuratketeranganaktif/pengajuanbaru/tolakpengajuan/{{ $pengajuan->id }}"
            method="post">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="deskripsi_pengajuan_ditolak" class="form-label">Tolak Pengajuan</label>
              <input type="hidden" name="deskripsi_pengajuan_ditolak" id="deskripsi_pengajuan_ditolak">
              <trix-editor input="deskripsi_pengajuan_ditolak">Deskripsikan pesan atau alasan menolak pengajuan ini dalam
                kalimat yang
                singkat dan
                jelas.
              </trix-editor>
              @error('deskripsi_pengajuan_ditolak')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
