@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengajuan Surat Keterangan Aktif</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pengajuan Surat Keterangan Aktif</h6>
      <a href="/mahasiswa/pengajuansuratketeranganaktif/create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
        Tambah
        Pengajuan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="80px">Aksi</th>
            <th>Tanggal Pengajuan</th>
            <th>Deskripsi</th>
            <th>Status</th>
          </thead>
          <tbody>
            @foreach ($list_pengajuan as $pengajuan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @include('layouts.utils.info', [
                        'url' => url('mahasiswa/pengajuansuratketeranganaktif'),
                        'id' => $pengajuan->id,
                    ])
                    @include('layouts.utils.edit', [
                        'url' => url('mahasiswa/pengajuansuratketeranganaktif'),
                        'id' => $pengajuan->id,
                    ])
                    @include('layouts.utils.delete', [
                        'url' => url('mahasiswa/pengajuansuratketeranganaktif'),
                        'id' => $pengajuan->id,
                    ])
                  </div>
                </td>
                <td>{{ $pengajuan->tanggal_pengajuan_string }}</td>
                <td>{{ $pengajuan->deskripsi }}</td>
                <td>{{ $pengajuan->status }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
