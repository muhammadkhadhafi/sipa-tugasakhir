@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Wisuda</h1>

  @include('layouts.utils.notif')

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items center">
      <h6 class="m-0 text-primary font-weight-bold text-uppercase">Pendaftaran</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="130px">Aksi</th>
            <th width="160px">Tanggal</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
          </thead>
          <tbody>
            @foreach ($list_pendaftaran as $pendaftaran)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ url('admin/wisuda/pendaftaran/' . $pendaftaran->id) }}" class="btn btn-sm btn-primary"><i
                      class="fas fa-info fa-xs"></i> Detail Pendaftaran</a></td>
                <td>{{ $pendaftaran->tanggalPendaftaranString }}</td>
                <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                <td>{{ $pendaftaran->mahasiswa->nama }}</td>
                <td>{{ $pendaftaran->mahasiswa->prodi->nama }}</td>
                <td>{{ $pendaftaran->mahasiswa->angkatan }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
