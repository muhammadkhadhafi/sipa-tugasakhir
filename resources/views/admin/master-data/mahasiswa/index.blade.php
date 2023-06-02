@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Mahasiswa</h6>
      <a href="/admin/master-data/mahasiswa/create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah
        Mahasiswa</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="80px">Aksi</th>
            <th>Nama</th>
            <th>NIM</th>
          </thead>
          <tbody>
            @foreach ($mahasiswas as $mahasiswa)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @include('layouts.utils.info', [
                        'url' => url('admin/master-data/mahasiswa'),
                        'id' => $mahasiswa->id,
                    ])
                    @include('layouts.utils.edit', [
                        'url' => url('admin/master-data/mahasiswa'),
                        'id' => $mahasiswa->id,
                    ])
                    @include('layouts.utils.delete', [
                        'url' => url('admin/master-data/mahasiswa'),
                        'id' => $mahasiswa->id,
                    ])
                  </div>
                </td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->nim }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
