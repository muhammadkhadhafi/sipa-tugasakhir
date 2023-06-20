@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pengaduan Baru</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="125px">Aksi</th>
            <th width="160px">Tanggal</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
          </thead>
          <tbody>
            @foreach ($list_pengaduan as $pengaduan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="/admin/pengaduan/pengaduanbaru/{{ $pengaduan->id }}" class="btn btn-sm btn-primary"><i
                        class="fas fa-info fa-xs"></i> Detail Pengaduan</a>
                  </div>
                </td>
                <td>{{ $pengaduan->tanggal_pengaduan_string }}</td>
                <td>{{ $pengaduan->mahasiswa->nim }}</td>
                <td>{{ $pengaduan->mahasiswa->nama }}</td>
                <td>{{ $pengaduan->mahasiswa->prodi->nama }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
