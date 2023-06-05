@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pengaduan</h6>
      <a href="/mahasiswa/pengaduan/create" class="btn btn-sm btn-primary px-3"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="80px">Aksi</th>
            <th width="160px">Tanggal</th>
            <th>Judul Pengaduan</th>
            <th width="80px">Status</th>
          </thead>
          <tbody>
            @foreach ($list_pengaduan as $pengaduan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @include('layouts.utils.info', [
                        'url' => url('mahasiswa/pengaduan'),
                        'id' => $pengaduan->id,
                    ])
                    @include('layouts.utils.edit', [
                        'url' => url('mahasiswa/pengaduan'),
                        'id' => $pengaduan->id,
                    ])
                    @include('layouts.utils.delete', [
                        'url' => url('mahasiswa/pengaduan'),
                        'id' => $pengaduan->id,
                    ])
                  </div>
                </td>
                <td>{{ $pengaduan->tanggal_pengaduan_string }}</td>
                <td>{{ $pengaduan->judul_pengaduan }}</td>
                <td>
                  @if ($pengaduan->status == 1)
                    <span class="badge badge-secondary p-1">Pengaduan baru</span>
                  @elseif($pengaduan->status == 2)
                    <span class="badge badge-success p-1">Pengaduan selesai</span>
                  @elseif($pengaduan->status == 3)
                    <span class="badge badge-danger p-1">Pengaduan ditolak</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection