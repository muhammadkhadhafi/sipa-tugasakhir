@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pegawai</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pegawai</h6>
      <a href="/admin/master-data/pegawai/create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah
        Pegawai</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>NIP</th>
          </thead>
          <tbody>
            @foreach ($pegawais as $pegawai)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @include('layouts.utils.info', [
                        'url' => url('admin/master-data/pegawai'),
                        'id' => $pegawai->id,
                    ])
                    @include('layouts.utils.edit', [
                        'url' => url('admin/master-data/pegawai'),
                        'id' => $pegawai->id,
                    ])
                    @include('layouts.utils.delete', [
                        'url' => url('admin/master-data/pegawai'),
                        'id' => $pegawai->id,
                    ])
                  </div>
                </td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->nip }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection