@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Surat Keterangan Aktif</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pengajuan Baru</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="120px">Aksi</th>
            <th width="160px">Tanggal Pengajuan</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
          </thead>
          <tbody>
            @foreach ($list_pengajuan as $pengajuan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="/admin/pengajuansuratketeranganaktif/pengajuanbaru/{{ $pengajuan->id }}"
                      class="btn btn-sm btn-primary"><i class="fas fa-info fa-xs"></i> Detail Pengajuan</a>
                  </div>
                </td>
                <td>{{ $pengajuan->tanggal_pengajuan_string }}</td>
                <td>{{ $pengajuan->mahasiswa->nim }}</td>
                <td>{{ $pengajuan->mahasiswa->nama }}</td>
                <td>{{ $pengajuan->mahasiswa->prodi->nama }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
