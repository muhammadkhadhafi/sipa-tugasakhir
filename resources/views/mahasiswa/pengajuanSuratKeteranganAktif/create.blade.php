@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengajuan Surat Keterangan Aktif</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pengajuan</h6>
    </div>
    <div class="card-body">
      <form action="{{ url('mahasiswa/pengajuansuratketeranganaktif') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="semester" class="form-label">Semester</label>
              <select name="semester" id="semester" class="form-control @error('semester') is-invalid  @enderror">
                <option value="" selected>Pilih semester</option>
                @if (auth()->user()->prodi->program == 'DIII')
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                @else
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                @endif
              </select>
              @error('semester')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="no_hp" class="form-label">No Hp</label>
              <input type="number" name="no_hp" id="no_hp"
                class="form-control @error('no_hp') is-invalid @enderror">
              @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
              <input type="text" name="nama_orang_tua" id="nama_orang_tua"
                class="form-control @error('nama_orang_tua') is-invalid @enderror">
              @error('nama_orang_tua')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="pekerjaan_orang_tua" class="form-label">Pekerjaan Orang Tua</label>
              <select name="pekerjaan_orang_tua" id="pekerjaan_orang_tua"
                class="form-control @error('pekerjaan_orang_tua') is-invalid @enderror">
                <option value="" selected>Pilih pekerjaan orang tua</option>
                <option value="Tidak Bekerja">Tidak Bekerja</option>
                <option value="Bekerja">Bekerja</option>
                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                <option value="Belum Bekerja">Belum Bekerja</option>
                <option value="PNS">PNS</option>
                <option value="BUMN">BUMN</option>
                <option value="Pelajar">Pelajar</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Guru Honor">Guru Honor</option>
                <option value="Dosen">Dosen</option>
                <option value="Petani">Petani</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Pedagang">Pedagang</option>
                <option value="TNI">TNI</option>
                <option value="POLRI">POLRI</option>
                <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                <option value="Supir">Supir</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="PNS (Tugas Belajar)">PNS (Tugas Belajar)</option>
                <option value="Wirausahawan">Wirausahawan</option>
                <option value="Peneliti">Peneliti</option>
                <option value="Magang">Magang</option>
                <option value="Tenaga Pengajar/Infrastruktur/Fasilitator">Tenaga Pengajar/Infrastruktur/Fasilitator
                </option>
                <option value="Pimpinan/Manajerial">Pimpinan/Manajerial</option>
              </select>
              @error('pekerjaan_orang_tua')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="deskripsi_pengajuan" class="form-label">Deskripsi Pengajuan</label>
              <input id="deskripsi_pengajuan" type="hidden" name="deskripsi_pengajuan">
              <trix-editor input="deskripsi_pengajuan">Deskripsikan keperluan anda mengajukan surat keterangan aktif dalam
                kalimat
                yang singkat dan jelas.</trix-editor>
              @error('deskripsi_pengajuan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save fa-sm"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
