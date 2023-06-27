@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  @include('layouts.utils.notif')

  <div class="row">
    <div class="col-lg-7">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pengaduan</h6>
          <form action="/admin/pengaduan/pengaduanselesai/prosesulang/{{ $pengaduan->id }}" method="post"
            onclick="return confirm('Yakin ingin proses ulang pengaduan ini?')">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-redo-alt fa-sm"></i> Proses
              Ulang</button>
          </form>
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
                      class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye"></i> Preview</a>
                  @else
                    Tidak/belum ada bukti
                  @endif
                </dd>
                <dt>Deskripsi Pengaduan</dt>
                <dd>{!! $pengaduan->deskripsi_pengaduan !!}</dd>
                <dt>Deskripsi Tindak Lanjut</dt>
                <dd>{!! $pengaduan->deskripsi_tindak_lanjut !!}</dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header d-flex align-items center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tindak Lanjut</h6>
        </div>
        <div class="card-body">
          <form action="/admin/pengaduan/pengaduanselesai/editdeskripsitindaklanjut/{{ $pengaduan->id }}" method="post">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="deskripsi_tindak_lanjut">Edit Deskripsi Tindak Lanjut</label>
                  <input type="hidden" name="deskripsi_tindak_lanjut" id="deskripsi_tindak_lanjut">
                  <trix-editor input="deskripsi_tindak_lanjut">{!! $pengaduan->deskripsi_tindak_lanjut !!}</trix-editor>
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
                <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
