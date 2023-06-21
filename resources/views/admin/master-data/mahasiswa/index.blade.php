@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Mahasiswa</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Mahasiswa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="50px">Aksi</th>
            <th width="80px">NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
          </thead>
          <tbody>
            @foreach ($mahasiswas as $mahasiswa)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ url('admin/master-data/mahasiswa/' . $mahasiswa->id) }}" class="btn btn-sm btn-primary"><i
                        class="fas fa-info fa-xs"></i> Detail</a>
                  </div>
                </td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->prodi->program }} {{ $mahasiswa->prodi->nama }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
