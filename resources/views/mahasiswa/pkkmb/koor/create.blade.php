@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Koordinator Absensi PKKMB</h1>

  @include('layouts.utils.notif')

  <div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Absensi PKKMB</h6>
    </div>
    <div class="card-body">
      <form action="/mahasiswa/pkkmb/koor" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="tanggal_pertemuan" class="form-label">Tanggal Pertemuan</label>
              <input type="date" name="tanggal_pertemuan" id="tanggal_pertemuan"
                class="form-control @error('tanggal_pertemuan') is-invalid @enderror"
                value="{{ old('tanggal_pertemuan') }}">
              @error('tanggal_pertemuan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="bukti_kegiatan" class="form-label">Bukti Kegiatan</label>
              <input type="file" accept=".jpg, .png" name="bukti_kegiatan" id="bukti_kegiatan"
                class="form-control @error('bukti_kegiatan') is-invalid @enderror">
              @error('bukti_kegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="materi_kegiatan" class="form-label">Materi Kegiatan</label>
              <input type="text" name="materi_kegiatan" id="materi_kegiatan"
                class="form-control @error('materi_kegiatan') is-invalid @enderror" value="{{ old('materi_kegiatan') }}">
              @error('materi_kegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow mb-3">
              <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                <h6 class="m-0 font-weight-bold text-light text-uppercase">Anggota Absensi</h6>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover mb-0" width="100%" cellspacing="0">
                    <thead class="text-uppercase">
                      <th width="60px">No</th>
                      <th width="130px">NIM</th>
                      <th>Nama</th>
                      <th width="400px">Keterangan</th>
                    </thead>
                    <tbody>
                      @foreach ($list_anggota as $anggota)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $anggota->nim }}</td>
                          <td>{{ $anggota->nama }}</td>
                          <td>
                            <input type="radio" name="absen[{{ $anggota->id }}]" value="hadir" class="absen-radio"
                              onchange="toggleFileInput(this)" checked>
                            <span class="status mr-2">Hadir</span>
                            <input type="radio" name="absen[{{ $anggota->id }}]" value="izin" class="absen-radio"
                              onchange="toggleFileInput(this)"
                              {{ old('absen.' . $anggota->id) == 'izin' ? 'checked' : '' }}>
                            <span class="status mr-2">Izin</span>
                            <input type="radio" name="absen[{{ $anggota->id }}]" value="sakit" class="absen-radio"
                              onchange="toggleFileInput(this)"
                              {{ old('absen.' . $anggota->id) == 'sakit' ? 'checked' : '' }}>
                            <span class="status mr-2">Sakit</span>
                            <div class="row file-input-container" style="display: none;">
                              <div class="col-lg-12">
                                <input type="file" name="bukti[{{ $anggota->id }}]" class="form-control mt-2"
                                  accept=".pdf">
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
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
  <script>
    function toggleFileInput(element) {
      var fileInputContainer = element.parentElement.getElementsByClassName('file-input-container')[0];

      if (element.value === 'hadir') {
        fileInputContainer.style.display = 'none';
      } else {
        fileInputContainer.style.display = 'block';
      }
    }

    // Saat halaman dimuat, periksa setiap elemen radio yang sudah dicentang dan tampilkan input file jika diperlukan
    window.addEventListener('DOMContentLoaded', function() {
      var radioButtons = document.getElementsByClassName('absen-radio');

      for (var i = 0; i < radioButtons.length; i++) {
        var radioButton = radioButtons[i];
        var fileInputContainer = radioButton.parentElement.getElementsByClassName('file-input-container')[0];

        if (radioButton.checked && (radioButton.value === 'izin' || radioButton.value === 'sakit')) {
          fileInputContainer.style.display = 'block';
        }
      }
    });
  </script>
@endsection
