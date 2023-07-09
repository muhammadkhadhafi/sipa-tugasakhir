@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Koordinator Absensi PKKMB</h1>

  <div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Absensi PKKMB</h6>
    </div>
    <div class="card-body">
      <div class="row mb-2">
        <div class="col-lg-12">
          <dt>Tanggal Pertemuan</dt>
          <dd>{{ $pertemuan->tanggalPertemuanString }}</dd>
          <dt>Bukti Kegiatan</dt>
          <dd>
            <a href="" target="popup"
              onclick="window.open('{{ asset('storage/' . $pertemuan->bukti_kegiatan) }}','popup','width=800,height=600'); return false;"
              class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye fa-sm"></i> Preview</a>
          </dd>
          <dt>Materi Kegiatan</dt>
          <dd>{{ $pertemuan->materi_kegiatan }}</dd>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
              <h6 class="m-0 font-weight-bold text-light text-uppercase">Anggota Izin</h6>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0" width="100%" cellspacing="0">
                  <thead class="text-uppercase">
                    <th width="60px">No</th>
                    <th width="130px">NIM</th>
                    <th>Nama</th>
                  </thead>
                  <tbody>
                    @foreach ($list_izin as $izin)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $izin->nim }}</td>
                        <td>{{ $izin->nama }}</td>
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
          <div class="card shadow mb-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
              <h6 class="m-0 font-weight-bold text-light text-uppercase">Anggota Sakit</h6>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0" width="100%" cellspacing="0">
                  <thead class="text-uppercase">
                    <th width="60px">No</th>
                    <th width="130px">NIM</th>
                    <th>Nama</th>
                  </thead>
                  <tbody>
                    @foreach ($list_sakit as $sakit)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sakit->nim }}</td>
                        <td>{{ $sakit->nama }}</td>
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
          <div class="card shadow mb-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
              <h6 class="m-0 font-weight-bold text-light text-uppercase">Anggota Hadir</h6>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0" width="100%" cellspacing="0">
                  <thead class="text-uppercase">
                    <th width="60px">No</th>
                    <th width="130px">NIM</th>
                    <th>Nama</th>
                  </thead>
                  <tbody>
                    @foreach ($list_hadir as $hadir)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hadir->nim }}</td>
                        <td>{{ $hadir->nama }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
