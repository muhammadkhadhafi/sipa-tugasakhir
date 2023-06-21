@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  <form action="/admin/master-data/mahasiswa/{{ $mahasiswa->id }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-lg-3">
        <img src="/assets/img/default-person.jpg" alt="{{ $mahasiswa->nama }}" class="img-fluid" style="width: 100%">
        <input type="file" name="foto" id="foto" class="form-control" style="border-radius: 0;">
      </div>
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Edit Mahasiswa</h6>
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save"></i> Simpan</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control  id="nama" name="nama" value="{{ $mahasiswa->nama }}"
                    readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control  id="nim" name="nim" value="{{ $mahasiswa->nim }}"
                    readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="program_studi" class="form-label">Program Studi</label>
                  <input type="text" id="program_studi" name="program_studi" class="form-control"
                    value="{{ $mahasiswa->prodi->program }} {{ $mahasiswa->prodi->nama }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                    value="{{ $mahasiswa->jenisKelaminString }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="agama" class="form-label">Agama</label>
                  <input type="text" id="agama" name="agama" class="form-control"
                    value="{{ $mahasiswa->agamaString }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="tempat_lahir" class="form-control" id="tempat_lahir" name="tempat_lahir"
                    value="{{ $mahasiswa->tempat_lahir }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ $mahasiswa->tanggal_lahir }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="angkatan" class="form-label">Angkatan</label>
                  <input type="angkatan" class="form-control" name="angkatan" id="angkatan"
                    value="{{ $mahasiswa->angkatan }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" class="form-control" name="nik" id="nik"
                    value="{{ $mahasiswa->nik }}" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email"
                    value="{{ $mahasiswa->email }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control" readonly>{{ $mahasiswa->alamat }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Kosongkan jika tidak ingin diubah">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
