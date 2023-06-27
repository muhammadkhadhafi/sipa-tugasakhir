@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Wisuda</h1>

  <div class="row">
    <div class="col-lg-7">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pendaftaran Wisuda</h6>
        </div>
        <div class="card-body">
          <dl>
            <dt>Nama</dt>
            <dd>{{ $pendaftaran->mahasiswa->nama }}</dd>
            <dt>NIM</dt>
            <dd>{{ $pendaftaran->mahasiswa->nim }}</dd>
            <dt>Angkatan</dt>
            <dd>{{ $pendaftaran->mahasiswa->angkatan }}</dd>
            <dt>Program Studi</dt>
            <dd>{{ $pendaftaran->mahasiswa->prodi->nama }}</dd>
            <dt>Jurusan</dt>
            <dd>{{ $pendaftaran->mahasiswa->prodi->jurusan->nama }}</dd>
            <dt>Waktu Pendaftaran</dt>
            <dd>{{ $pendaftaran->waktuPendaftaranString }}</dd>
            <dt>Berkas Pendaftaran Wisuda</dt>
            <dd>
              <a href="" target="popup"
                onclick="window.open('{{ asset('storage/' . $pendaftaran->berkas_pendaftaran_wisuda) }}','popup','width=800,height=600'); return false;"
                class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye fa-sm"></i> Preview</a>
            </dd>
          </dl>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Verifikasi Pendaftaran</h6>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-lg-12">
              <form action="{{ url('admin/wisuda/pendaftaran/verifikasi/' . $pendaftaran->id) }}" method="post"
                class="d-flex" onclick="return confirm('Yakin ingin memverifikasi pendaftaran ini?')">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-sm btn-primary flex-fill" style="border-radius: 0"><i
                    class="far fa-check-circle fa-sm"></i> Verifikasi</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tolak Pendaftaran</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="{{ url('/admin/wisuda/pendaftaran/tolak/' . $pendaftaran->id) }}" method="post"
                onsubmit="return confirm('Yakin ingin menolak pendaftaran ini?')">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="deskripsi_pendaftaran_ditolak" class="form-label">Tolak Pendaftaran</label>
                  <input type="hidden" name="deskripsi_pendaftaran_ditolak" id="deskripsi_pendaftaran_ditolak">
                  <trix-editor input="deskripsi_pendaftaran_ditolak">Deskripsikan pesan atau alasan menolak pendaftaran
                    ini
                    dalam
                    kalimat yang
                    singkat dan
                    jelas.
                  </trix-editor>
                  @error('deskripsi_pendaftaran_ditolak')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
